<?php

namespace common\models;

use frontend\models\Utils;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "edu_kids".
 *
 * @property int $id
 * @property int $category_id
 * @property string $thumb
 * @property string $video
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $date
 * @property int $is_active
 * @property int $viewed

 */
class EduKids extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    public $file;
    public $thumb_image;
    public $title;

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

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_kids';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'category_id'], 'required'],
            [['date'], 'safe'],
            [['is_active', 'category_id'], 'integer'],
            [['thumb', 'video', 'title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'mp4'],
            [['thumb_image'], 'file', 'extensions' => 'jpg'],
            [['file', 'thumb_image'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file', 'thumb_image'], 'safe', 'on' => self::SCENARIO_UPDATE],
  	    [['viewed'],'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID номер',
            'category_id' => 'Категория',
            'thumb' => 'Превию',
            'thumb_image' => 'Превию',
            'video' => 'Видео',
            'file' => 'Видео',
            'title_ru' => Yii::t('main', 'Названия на русском'),
            'title_uz' => Yii::t('main', 'Названия на узбекском'),
            'title_en' => Yii::t('main', 'Названия на английском'),
            'date' => 'Дата',
            'is_active' => 'Статус',
        ];
    }

    public function upload()
    {
        $width = 300;
        $height = 300;

        if ($this->validate()) {
            $guid = Yii::$app->security->generateRandomString(32);
            $this->video = "uploads/edu_kids/{$guid}.mp4";
            $this->thumb = "uploads/edu_kids/thumbs/{$guid}.jpg";
            $original = Yii::getAlias("@frontend/web/{$this->video}");
            $path = Yii::getAlias("@frontend/web/{$this->thumb}");
            if ($this->file->saveAs($original, false) && $this->thumb_image->saveAs($path)) {
                $this->file = $guid;
                $this->thumb_image = $guid;
                Utils::resizeImage($path, $width, $height);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
