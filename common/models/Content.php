<?php

namespace common\models;

use frontend\models\Utils;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $content_ru
 * @property string $content_uz
 * @property string $content_en
 * @property string $date
 * @property string $image_id
 * @property string $category_id
 * @property string $type
 * @property string $status
 * @property string $images_list
 * @property int $is_active
 * @property int $viewed
 * @property string $status
 * @property int $project_customer_id
 * @property int $department_id
 * @property int $project_type_id
 * @property string $main_image_id
 * @property string $logo_id
 * @property string $content2_ru
 * @property string $content2_uz
 * @property string $content2_en
 * @property string $content3_ru
 * @property string $content3_uz
 * @property string $content3_en
 * @property string $video_id
 * @property string $partner_id
 * @property string $web_link
 * @property string $mobile_link
 * @property string $ios_link
 * @property string $sub_title_uz
 * @property string $sub_title_ru
 * @property string $sub_title_en
 * 
 */
class Content extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    const TYPE_PROJECTS = 'projects';

    public $file;
    public $main_image;
    public $logo;
    public $video;
    public $title;
    public $sub_title;
    public $content;
    public $content2;
    public $content3;

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
        $this->sub_title = $this->{'sub_title_' . Yii::$app->language};
        $this->content = $this->{'content_' . Yii::$app->language};
        $this->content2 = $this->{'content2_' . Yii::$app->language};
        $this->content3 = $this->{'content3_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'content_ru', 'content_uz', 'content_en','sub_title_uz','sub_title_en','sub_title_ru'], 'required'],
            [['type', 'images_list','content2_ru','content2_uz','content2_en','content3_ru','content3_uz','content3_en'], 'string'],
            [['date', 'content'], 'safe'],
            [['is_active','viewed'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'image_id','main_image_id','logo_id','video_id','web_link','mobile_link','ios_link','sub_title_uz','sub_title_ru','sub_title_en'], 'string', 'max' => 255],
            [['title', 'status'], 'string', 'max' => 255],
            [['category_id'], 'string', 'max' => 100],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['project_customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectCustomer::className(), 'targetAttribute' => ['project_customer_id' => 'id']],
            [['project_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectType::className(), 'targetAttribute' => ['project_type_id' => 'id']],
            // [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['partner_id' => 'id']],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png'],
            [['file'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file'], 'safe', 'on' => self::SCENARIO_UPDATE],
            [['video'], 'file', 'extensions' => 'mp4'],
            [['video'], 'safe', 'on' => self::SCENARIO_UPDATE],
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
            'image_id' => Yii::t('main', 'Главная Картинка (.jpg)'),
            'file' => Yii::t('main', 'Главная Картинка (.jpg)'),
            'category_id' => Yii::t('main', 'Тип роекта'),
            'type' => Yii::t('main', 'Тип'),
            'status' => Yii::t('main', 'Статус'),
            'images_list' => Yii::t('main', 'Картинки'),
            'is_active' => Yii::t('main', 'Статус'),
            'project_customer_id' => Yii::t('main', 'Заказчик'),
            'department_id' => Yii::t('main', 'Департамент'),
            'project_type_id' => Yii::t('main', 'Категория'),
            // 'partner_id' => Yii::t('main', 'Партнёры проекта'),
            'main_image' => Yii::t('main', 'Баннер (.png)'),
            'main_image_id' => Yii::t('main', 'Баннер (.png)'),
            'logo' => Yii::t('main', 'Лого (.png)'),
            'content2_ru' => Yii::t('main', 'Доп. информация о проекте на русском 2'),
            'content2_uz' => Yii::t('main', 'Доп. информация о проекте на узбекском 2'),
            'content2_en' => Yii::t('main', 'Доп. информация о проекте на английском 2'),
            'content3_ru' => Yii::t('main', 'Доп. информация о проекте на русском 3'),
            'content3_uz' => Yii::t('main', 'Доп. информация о проекте на узбекском 3'),
            'content3_en' => Yii::t('main', 'Доп. информация о проекте на английском 3'),
            'video' => Yii::t('main', 'Видео (.mp4)'),
            'web_link' => Yii::t('main', 'Ссылка на веб-сайт'),
            'mobile_link' => Yii::t('main', 'Ссылка на андроид версию'),
            'ios_link' => Yii::t('main', 'Ссылка на IOS версию'),
            'sub_title_uz' => Yii::t('main', 'Лозунг на узбекском'),
            'sub_title_ru' => Yii::t('main', 'Лозунг на русском'),
            'sub_title_en' => Yii::t('main', 'Лозунг на английском'),

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

  /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }
    // public function getPartner()
    // {
    //     return $this->hasOne(Partners::className(), ['id' => 'partner_id']);
    // }

    /**
     * Gets query for [[ProjectCustomer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectCustomer()
    {
        return $this->hasOne(ProjectCustomer::className(), ['id' => 'project_customer_id']);
    }

    /**
     * Gets query for [[ProjectType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectType()
    {
        return $this->hasOne(ProjectType::className(), ['id' => 'project_type_id']);
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

    public function uploadlogo()
    {
        $_folder = Yii::getAlias("@frontend/web/uploads");
        if (!empty($folder))
            $_folder = $folder;

        if ($this->validate()) {
            $path = ("{$_folder}/{$this->logo_id}.png");
            if ($this->logo->saveAs($path, false)) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
    public function uploadvideo()
    {
        $_folder = Yii::getAlias("@frontend/web/uploads/video");
        if (!empty($folder))
            $_folder = $folder;

        if ($this->validate()) {
            $path = ("{$_folder}/{$this->video_id}.mp4");
            if ($this->video->saveAs($path, false)) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
    public function uploadimage()
    {
        $_folder = Yii::getAlias("@frontend/web/uploads");
        if (!empty($folder))
            $_folder = $folder;

        if ($this->validate()) {
            $path = ("{$_folder}/{$this->main_image_id}.png");
            if ($this->main_image->saveAs($path, false)) {
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
