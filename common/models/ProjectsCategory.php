<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "projects_category".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property int $is_active
 *
 * @property Content $categories
 * @property Content $amount
 */
class ProjectsCategory extends \yii\db\ActiveRecord
{
    public $title;

    const STATUS_PROCESS = 'process';
    const STATUS_PROCESSED = 'processed';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en'], 'required'],
            [['is_active'], 'integer'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
        ];
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
            'is_active' => 'Статус',
        ];
    }

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
    }

    public static function fetchData()
    {
        return ArrayHelper::map(
            self::find()->where(['is_active' => true])->orderBy(['id' => SORT_ASC])->all(),
            'id',
            'title'
        );
    }

    public function getCategories()
    {
        return $this->hasMany(Content::className(), ['category_id' => 'id'])
            ->andWhere(['is_active' => true])->orderBy([
                'date' => SORT_DESC,
                'id' => SORT_DESC
            ]);
    }

    public function getAmount()
    {
        return $this->hasMany(Content::className(), ['category_id' => 'id'])
            ->andWhere(['is_active' => true])->orderBy([
                'date' => SORT_DESC,
                'id' => SORT_DESC
            ])->count();
    }
}
