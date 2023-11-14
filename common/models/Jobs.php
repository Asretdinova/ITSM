<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property string $apps
 * @property int $date
 * @property int $is_active
 */
class Jobs extends \yii\db\ActiveRecord
{
    public $title;
    public $description;

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
        $this->description = $this->{'description_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apps'], 'string'],
            [['is_active'], 'integer'],
            [['date'], 'safe'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['title_ru', 'title_uz', 'title_en', 'description_ru', 'description_uz', 'description_en'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'title_ru' => Yii::t('main', 'Заголовок на русском'),
            'title_uz' => Yii::t('main', 'Заголовок на узбекском'),
            'title_en' => Yii::t('main', 'Заголовок на английском'),
            'description_ru' => 'Описания на русском',
            'description_uz' => 'Описания на узбекском',
            'description_en' => 'Описания на английском',
            'apps' => Yii::t('main', 'Обязательно надо знать эти программы'),
            'date' => Yii::t('main', 'Дата'),
            'is_active' => Yii::t('main', 'Статус'),
        ];
    }
}
