<?php

namespace common\models;

use frontend\models\Utils;
use Yii;

/**
 * This is the model class for table "videogallery".
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $date
 * @property int|null $seen
 * @property string|null $video
 *
 * @property Videocategory $category
 */
class Videogallery extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = 'update';

    public $file;
    public $thumb_image;
    public $title;
    
    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videogallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'seen'], 'integer'],
            [['date'], 'safe'],
            [['file'], 'file', 'extensions' => 'mp4'],
            [['title_uz', 'title_ru', 'title_en', 'video','thumb'], 'string', 'max' => 255],
            [['thumb_image'], 'file', 'extensions' => 'jpg'],
            [['file', 'thumb_image'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file', 'thumb_image'], 'safe', 'on' => self::SCENARIO_UPDATE],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Videocategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title_uz' => 'Title Uz',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'date' => 'Date',
            'seen' => 'Viewed',
            'video' => 'Video',
            'file' => 'Video',
            'thumb' => 'Preview',
            'thumb_image' => 'Preview',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Videocategory::className(), ['id' => 'category_id']);
    }
    public function upload()
    {
        $width = 300;
        $height = 300;

        if ($this->validate()) {
            $guid = Yii::$app->security->generateRandomString(32);
            $this->video = "uploads/videogallery/{$guid}.mp4";
            $this->thumb = "uploads/videogallery/thumbs/{$guid}.jpg";
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
