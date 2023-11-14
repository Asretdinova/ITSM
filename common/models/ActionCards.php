<?php

namespace common\models;

use frontend\models\Utils;
use Yii;

/**
 * This is the model class for table "action_cards".
 *
 * @property int $id
 * @property string $page_code
 * @property int $card_id
 * @property string $image
 * @property string $about_ru
 * @property string $about_uz
 * @property string $about_en
 *
 * @property int $page
 */
class ActionCards extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    public $file;
    public $about;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'action_cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_id'], 'integer'],
            [['page_code', 'image'], 'string', 'max' => 255],
            [['about_ru', 'about_uz', 'about_en'], 'string'],
            [['file'], 'file', 'extensions' => 'png'],
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
            'page_code' => 'Страница',
            'card_id' => 'Номер карты',
            'image' => 'Иконка',
            'file' => 'Иконка',
            'about_ru' => 'Описания на русском',
            'about_uz' => 'Описания на узбекском',
            'about_en' => 'Описания на английском',
        ];
    }

    public function afterFind()
    {
        $this->about = $this->{'about_' . Yii::$app->language};

        parent::afterFind();
    }

    public function getPage()
    {
        return $this->hasOne(Pages::className(), ['code_name' => 'page_code']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image = Yii::$app->security->generateRandomString(32);
            $path = Yii::getAlias("@frontend/web/uploads/{$this->image}.png");
            if ($this->file->saveAs($path)) {
                $this->file = $this->image;
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
