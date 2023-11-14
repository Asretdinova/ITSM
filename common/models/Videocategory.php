<?php

namespace common\models;

use Yii;
use frontend\models\Utils;

/**
 * This is the model class for table "videocategory".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $image
 *
 * @property Videogallery[] $videogalleries
 */
class Videocategory extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = 'update';

    public $file;
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
        return 'videocategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_uz', 'title_ru', 'title_en', 'image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png'],
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
            'id' => Yii::t('main', 'ID номер'),
            'title_ru' => Yii::t('main', 'Названия на русском'),
            'title_uz' => Yii::t('main', 'Названия на узбекском'),
            'title_en' => Yii::t('main', 'Названия на английском'),
            'image' => Yii::t('main', 'Картинка'),
            'file' => 'Image',

        ];
    }

    /**
     * Gets query for [[Videogalleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideogalleries()
    {
        return $this->hasMany(Videogallery::className(), ['category_id' => 'id']);
    }
    public function upload()
    {
        $width = 300;
        $height = 300;
    

        if ($this->validate()) {
            $guid = Yii::$app->security->generateRandomString(32);
            $this->image = "uploads/videogallery/{$guid}.jpg";
            // $original = Yii::getAlias("@frontend/web/{$this->image}");
            $path = Yii::getAlias("@frontend/web/{$this->image}");
            if ($this->file->saveAs($path)) {
                $this->file = $guid;
                Utils::resizeImage($path, $width, $height);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
    public static function getVideoByCategory($id)
    {
        // build a DB query to get all articles
        $query = Videogallery::find()->where(['category_id'=>$id])->all();
        return $query;
    }
}
