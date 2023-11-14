<?php

namespace common\models;

use frontend\models\Utils;
use Yii;

/**
 * This is the model class for table "references".
 *
 * @property int $id
 * @property string $photo
 * @property string $name_ru
 * @property string $name_uz
 * @property string $name_en
 * @property string $position_ru
 * @property string $position_uz
 * @property string $position_en
 * @property string $review_ru
 * @property string $review_uz
 * @property string $review_en
 * @property int $order
 * @property int $is_active
 */
class References extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    public $file;
    public $name;
    public $position;
    public $review;

    public function afterFind()
    {
        $this->name = $this->{'name_' . Yii::$app->language};
        $this->position = $this->{'position_' . Yii::$app->language};
        $this->review = $this->{'review_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'references';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review_ru', 'review_uz', 'review_en'], 'string'],
            [['order', 'is_active'], 'integer'],
            [['name_ru', 'name_uz', 'name_en', 'position_ru', 'position_uz', 'position_en', 'review_ru', 'review_uz', 'review_en', 'order'], 'required'],
            [['name_ru', 'name_uz', 'name_en', 'position_ru', 'position_uz', 'position_en'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg'],
            [['file'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file'], 'safe', 'on' => self::SCENARIO_UPDATE],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'photo' => Yii::t('main', 'Фото'),
            'file' => Yii::t('main', 'Фото'),
            'name_ru' => Yii::t('main', 'Имя на русском'),
            'name_uz' => Yii::t('main', 'Имя на узбекском'),
            'name_en' => Yii::t('main', 'Имя на английском'),
            'position_ru' => Yii::t('main', 'Должность на русском'),
            'position_uz' => Yii::t('main', 'Должность на узбекском'),
            'position_en' => Yii::t('main', 'Должность на английском'),
            'review_ru' => Yii::t('main', 'Отзыв на русском'),
            'review_uz' => Yii::t('main', 'Отзыв на узбекском'),
            'review_en' => Yii::t('main', 'Отзыв на английском'),
            'order' => Yii::t('main', 'Порядок'),
            'is_active' => Yii::t('main', 'Статус'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->photo = Yii::$app->security->generateRandomString(32);
            $path = Yii::getAlias("@frontend/web/uploads/content/{$this->photo}.jpg");
            if ($this->file->saveAs($path)) {
                $this->file = $this->photo;
                Utils::resizeImage($path, 300, 300);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
