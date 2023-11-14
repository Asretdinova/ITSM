<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "edu_kids_category".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property int $order
 * @property int $is_active
 *
 * @property EduKids videos
 */
class EduKidsCategory extends \yii\db\ActiveRecord
{
    public $title;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_kids_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'order'], 'required'],
            [['order', 'is_active'], 'integer'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
        ];
    }

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => Yii::t('main', 'Названия на русском'),
            'title_uz' => Yii::t('main', 'Названия на узбекском'),
            'title_en' => Yii::t('main', 'Названия на английском'),
            'order' => 'Порядок',
            'is_active' => 'Статус',
        ];
    }

    public function getVideos()
    {
        return $this->hasMany(EduKids::className(), ['category_id' => 'id'])
            ->andWhere(['is_active' => true])->orderBy([
                'date' => SORT_DESC,
                'id' => SORT_DESC
            ]);
    }

    public static function fetchData()
    {
        return ArrayHelper::map(
            self::find()->where(['is_active' => true])->orderBy(['order' => SORT_ASC])->all(),
            'id',
            'title'
        );
    }
}
