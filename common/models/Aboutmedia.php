<?php

namespace common\models;

use frontend\models\Utils;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "aboutmedia".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string|null $content_ru
 * @property string|null $content_uz
 * @property string|null $content_en
 * @property string|null $date
 * @property string $image_id
 * @property string|null $category_id
 * @property string|null $type
 * @property int|null $is_active
 * @property int|null $viewed
 */
class Aboutmedia extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    const TYPE_PROJECTS = 'projects';

    public $file;
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
                'value' => date('Y-m-d H:i:s'),
            ]
        ];
    }

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
        $this->content = $this->{'content_' . Yii::$app->language};
    }

    public static function tableName()
    {
        return 'aboutmedia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'content_ru', 'content_uz', 'content_en'], 'required'],
            [['type', 'images_list'], 'string'],
            [['date', 'content'], 'safe'],
            [['is_active','viewed'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'image_id'], 'string', 'max' => 255],
            [['title', 'status'], 'string', 'max' => 255],
            [['category_id'], 'string', 'max' => 100],
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
            'title' => Yii::t('main', 'Названия'),
            'content_ru' => Yii::t('main', 'Содержания на русском'),
            'content_uz' => Yii::t('main', 'Содержания на узбекском'),
            'content_en' => Yii::t('main', 'Содержания на английском'),
            'content' => Yii::t('main', 'Содержания'),
            'date' => Yii::t('main', 'Дата'),
            'image_id' => Yii::t('main', 'Картинка'),
            'file' => Yii::t('main', 'Картинка'),
            'category_id' => Yii::t('main', 'Категория'),
            'type' => Yii::t('main', 'Тип'),
            'status' => Yii::t('main', 'Статус'),
            'images_list' => Yii::t('main', 'Картинки'),
            'is_active' => Yii::t('main', 'Статус'),

        ];
    }
    
    public function getProjectCategories()
    {
        return $this->hasMany(Content::className(), ['category_id' => 'id'])
            ->andWhere(['is_active' => true])->orderBy([
                'date' => SORT_DESC,
                'id' => SORT_DESC
            ]);
    }
    public function upload($width, $height, $folder = null)
    {
        $_folder = Yii::getAlias("@frontend/web/uploads");
        if (!empty($folder))
            $_folder = $folder;

        if ($this->validate()) {
            $path = ("{$_folder}/{$this->image_id}.jpg");
            if ($this->file->saveAs($path, false)) {
                Utils::resizeImage($path, $width, $height);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
    public static function fetchProjectsList()
    {
        return ArrayHelper::map(
            self::find()->where(['is_active' => true, 'type' => 'projects'])->orderBy(['title_ru' => SORT_ASC])->all(),
            'id',
            'title'
        );
    }

    public static function getProjectsListArray()
    {
        $model = self::find()->where(['is_active' => true, 'type' => 'projects'])->all();

        $list = [];
        foreach ($model as $item) {
            $list[$item->id] = [
                'id' => $item->id,
                'image' => Yii::getAlias("@web/uploads/{$item->image_id}.jpg"),
                'title' => $item->title,
            ];
        }

        return $list;
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
}
