<?php

namespace common\models;

use frontend\models\Utils;
use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string $image
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property int $order
 * @property int $is_active
 */
class Banners extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    public $file;
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
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'order'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'description_ru', 'description_uz', 'description_en', 'order'], 'required'],
            [['image', 'title_ru', 'title_uz', 'title_en', 'description_ru', 'description_uz', 'description_en'], 'string', 'max' => 255],
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
            'id' => 'ID номер',
            'image' => 'Изображения',
            'file' => 'Изображения',
            'title_ru' => 'Названия на русском',
            'title_uz' => 'Названия на узбекском',
            'title_en' => 'Названия на английском',
            'description_ru' => 'Описания на русском',
            'description_uz' => 'Описания на узбекском',
            'description_en' => 'Описания на английском',
            'order' => 'Порядок',
            'is_active' => 'Статус',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image = Yii::$app->security->generateRandomString(32);
            $path = Yii::getAlias("@frontend/web/uploads/banners/{$this->image}.jpg");
            if ($this->file->saveAs($path)) {
                $this->file = $this->image;
                Utils::resizeImage($path, 1670, 700);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
