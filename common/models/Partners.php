<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $logo
 * @property string $url
 * @property int $order
 * @property int $is_active
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 */
class Partners extends BaseModel
{
    public $file;
    public $title;
    public $description;

    const SCENARIO_UPDATE = 'update';

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
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['is_active', 'order'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'logo', 'url'], 'string', 'max' => 255],
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['url'], 'match', 'pattern' => '/(http(s?):\/\/)([a-z0-9\-]+\.)+[a-z]{2,4}(\.[a-z]{2,4})*(\/[^ ]+)*/i', 'message' => 'Неправильный формат ссылки. Ссылка должен быть в формате http(s)://site.uz'],
            [['file'], 'file', 'extensions' => 'png, jpg'],
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
            'title_ru' => Yii::t('main', 'Названия на русском'),
            'title_uz' => Yii::t('main', 'Названия на узбекском'),
            'title_en' => Yii::t('main', 'Названия на английском'),
            'logo' => Yii::t('main', 'Логотип'),
            'file' => Yii::t('main', 'Логотип'),
            'url' => Yii::t('main', 'Ссылка на официальный веб сайт'),
            'order' => Yii::t('main', 'Порядковый номер'),
            'is_active' => Yii::t('main', 'Статус'),
            'description_ru' => Yii::t('main', 'Описания на русском'),
            'description_uz' => Yii::t('main', 'Описания на узбекском'),
            'description_en' => Yii::t('main', 'Описания на английском'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->logo = Yii::$app->security->generateRandomString(32) . ".{$this->file->extension}";
            $path = Yii::getAlias("@frontend/web/uploads/content/{$this->logo}");
            if ($this->file->saveAs($path)) {
                $this->file = $this->logo;
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
