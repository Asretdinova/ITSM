<?php

namespace common\models;

use frontend\models\Utils;
use Yii;

/**
 * This is the model class for table "achievements".
 *
 * @property int $id
 * @property string $image
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property int $has_content
 * @property string $content_ru
 * @property string $content_uz
 * @property string $content_en
 * @property string $url
 * @property string $date
 */
class Achievements extends BaseModel
{
    public $file;
    public $description;
    public $content;

    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'achievements';
    }

    public function afterFind()
    {
        parent::afterFind();

        $this->description = $this->{'description_' . Yii::$app->language};
        $this->content = $this->{'content_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'description_ru', 'description_uz', 'description_en'], 'required'],
            [['description_ru', 'description_uz', 'description_en', 'content_ru', 'content_uz', 'content_en', 'url'], 'string'],
            [['has_content'], 'integer'],
            [['date'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, jpeg'],
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
            'id' => 'ID',
            'image' => 'Картинка',
            'description_ru' => 'Описания на русском',
            'description_uz' => 'Описания на узбекском',
            'description_en' => 'Описания на английском',
            'has_content' => 'Имеется ли контент?',
            'content_ru' => 'Содержания на русском',
            'content_uz' => 'Содержания на узбекском',
            'content_en' => 'Содержания на английском',
            'url' => 'URL',
            'date' => 'Дата',

            [['file'], 'file', 'extensions' => 'jpg, jpeg'],
            [['file'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file'], 'safe', 'on' => self::SCENARIO_UPDATE],
        ];
    }

    public function upload($folder = null)
    {
        $_folder = Yii::getAlias("@frontend/web/uploads");
        if (!empty($folder))
            $_folder = $folder;

        if ($this->validate()) {
            $path = ("{$_folder}/{$this->image}.jpg");
            if ($this->file->saveAs($path, false)) {
                Utils::resizeImage($path, 700, 400);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
