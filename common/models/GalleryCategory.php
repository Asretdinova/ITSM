<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "gallery_category".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $date
 * @property int $is_active
 *
 * @property Gallery gallery
 */
class GalleryCategory extends \yii\db\ActiveRecord
{
    public $title;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_category';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'date',
                ],
                'value' => date('Y-m-d H:i:s'),
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['is_active'], 'integer'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['title_ru', 'title_uz', 'title_en'], 'required'],
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
            'date' => 'Дата',
            'is_active' => 'Статус',
        ];
    }

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
    }

    public function getGallery()
    {
        return $this->hasMany(Gallery::className(), ['category_id' => 'id'])
            ->andWhere(['is_active' => true])->orderBy([
                'date' => SORT_DESC,
                'id' => SORT_DESC
            ]);
    }

    public static function fetchData()
    {
        return ArrayHelper::map(
            self::find()->where(['is_active' => true])->orderBy(['date' => SORT_DESC])->all(),
            'id',
            'title'
        );
    }
}
