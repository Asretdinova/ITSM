<?php

namespace common\models;

use frontend\models\Utils;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property int $category_id
 * @property string $image
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property int $date
 * @property int $is_active
 */
class Gallery extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    public $file;
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
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file', 'category_id'], 'required'],
            [['is_active', 'category_id'], 'integer'],
            [['date'], 'safe'],
            [['image', 'title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
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
            'category_id' => 'Категория',
            'image' => 'Фото',
            'file' => 'Фото',
            'title_ru' => Yii::t('main', 'Названия на русском'),
            'title_uz' => Yii::t('main', 'Названия на узбекском'),
            'title_en' => Yii::t('main', 'Названия на английском'),
            'date' => 'Дата',
            'is_active' => 'Статус',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(GalleryCategory::className(), ['id' => 'category_id']);
    }

    public function upload()
    {
        $width = 255;
        $height = 175;

        if ($this->validate()) {
            $this->image = Yii::$app->security->generateRandomString(32);
            $original = Yii::getAlias("@frontend/web/uploads/gallery/{$this->image}.jpg");
            $path = Yii::getAlias("@frontend/web/uploads/gallery/thumbs/{$this->image}.jpg");
            if ($this->file->saveAs($original, false) && $this->file->saveAs($path)) {
                $this->file = $this->image;
                Utils::resizeImage($path, $width, $height);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
