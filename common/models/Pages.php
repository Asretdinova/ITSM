<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $code_name
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $content_ru
 * @property string $content_uz
 * @property string $content_en
 * @property string $date
 * @property string $images_list
 * @property int $is_active
 */
class Pages extends \yii\db\ActiveRecord
{
    public $title;
    public $content;

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'date',
                ],
                'value' => date('Y-m-d'),
            ]
        ];
    }

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
        $this->content = $this->{'content_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_name', 'title_ru', 'title_uz', 'title_en'], 'required'],
            [['content_ru', 'content_uz', 'content_en', 'images_list'], 'string'],
            [['date'], 'safe'],
            [['is_active'], 'integer'],
            [['code_name', 'title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['code_name'], 'unique'],
            [['code_name'], 'match', 'pattern' => '/^[0-9a-zA-Z_-]*$/i', 'message' => 'Разрешены только английские буквы, цифры и черточки'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID номер'),
            'code_name' => Yii::t('main', 'Кодовая названия'),
            'title_ru' => Yii::t('main', 'Заголовок на русском'),
            'title_uz' => Yii::t('main', 'Заголовок на узбекском'),
            'title_en' => Yii::t('main', 'Заголовок на английском'),
            'title' => Yii::t('main', 'Заголовок'),
            'content_ru' => Yii::t('main', 'Содержания на русском'),
            'content_uz' => Yii::t('main', 'Содержания на узбекском'),
            'content_en' => Yii::t('main', 'Содержания на английском'),
            'content' => Yii::t('main', 'Содержания'),
            'date' => Yii::t('main', 'Дата'),
            'images_list' => Yii::t('main', 'Картинки'),
            'is_active' => Yii::t('main', 'Статус'),
        ];
    }

    public static function getContent($code)
    {
        $model = self::find()->where(['code_name' => $code])->one();

        if (!$model)
            return '';

        return $model->{'content_' . Yii::$app->language};
    }
}
