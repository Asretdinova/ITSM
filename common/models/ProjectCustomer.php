<?php

namespace common\models;

use Yii;
use frontend\models\Utils;


/**
 * This is the model class for table "project_customer".
 *
 * @property int $id
 * @property string|null $title_ru
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $description_ru
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string|null $image_id
 *
 * @property Content[] $contents
 * @property Projects[] $projects
 */
class ProjectCustomer extends \yii\db\ActiveRecord
{
    public $file;
    public $title;

    const SCENARIO_UPDATE = 'update';

    public $base_url = 'https://itsm.uz';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['title_ru', 'title_uz', 'title_en', 'image_id'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png'],
            [['file'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file'], 'safe', 'on' => self::SCENARIO_UPDATE],
        ];
    }
    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
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
            'description_ru' =>Yii::t('main', 'Содержания на русском'),
            'description_uz' => Yii::t('main', 'Содержания на узбекском'),
            'description_en' => Yii::t('main', 'Содержания на английском'),
            'image_id' => Yii::t('main', 'Картинка'),
            'file' => Yii::t('main', 'Картинка'),
        ];
    }

    /**
     * Gets query for [[Contents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['project_customer_id' => 'id']);
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Projects::className(), ['project_customer_id' => 'id']);
    }


    public function upload()
    {
        if ($this->validate()) {
            $this->image_id = Yii::$app->security->generateRandomString(32) . ".{$this->file->extension}";
            $path = Yii::getAlias("@frontend/web/uploads/content/{$this->image_id}");
            if ($this->file->saveAs($path)) {
                $this->file = $this->image_id;
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
