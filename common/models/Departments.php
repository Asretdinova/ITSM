<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use paulzi\jsonBehavior\JsonBehavior;


/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $icon
 * @property int $order
 * @property string $projects_list
 * @property string $date
 *
 * @property Team $members
 */
class Departments extends BaseModel
{
    public $file;
    public $title;
    public $description;


    const SCENARIO_UPDATE = 'update';

    public function behaviors()
    {
        return [
           
            'timestamp' => [
                'class' => TimestampBehavior::className(),

                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'date'
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
            [ 'class' => JsonBehavior::className(),
            'attributes' => ['projects_list'],
            ]
        ];
    }

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
        $this->description = $this->{'description_' . Yii::$app->language};
        if (!is_array($this->projects_list))
            $this->projects_list = Json::decode($this->projects_list);
            
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order'], 'integer'],
            [['date'], 'safe'],
            [['title_ru', 'title_uz', 'title_en', 'order'], 'required'],
            [['title_ru', 'title_uz', 'title_en', 'icon'], 'string', 'max' => 255],
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['projects_list'], 'safe'],
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
            'id' => 'ID',
            'title_ru' => 'Названия на русском',
            'title_uz' => 'Названия на узбекском',
            'title_en' => 'Названия на английском',
            'icon' => 'Иконка',
            'file' => 'Иконка',
            'order' => 'Порядковый номер',
            'date' => 'Date',
            'projects_list' => Yii::t('main', 'Проекты'),
            'description_ru' => Yii::t('main', 'Описания на русском'),
            'description_uz' => Yii::t('main', 'Описания на узбекском'),
            'description_en' => Yii::t('main', 'Описания на английском'),
        ];
    }

    public static function fetchData()
    {
        return ArrayHelper::map(
            self::find()->all(),
            'id',
            'title_ru'
        );
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->icon = Yii::$app->security->generateRandomString(32) . ".{$this->file->extension}";
            $path = Yii::getAlias("@frontend/web/uploads/content/{$this->icon}");
            if ($this->file->saveAs($path)) {
                $this->file = $this->icon;
                return true;
            }

            return false;
        } else {
            return false;
        }
    }

    public function getMembers()
    {
        return $this->hasMany(Team::className(), ['department_id' => 'id'])
            ->where(['not in', 'category', [Team::CATEGORY_HEAD, Team::CATEGORY_MANAGER]])
            ->orWhere(['category' => null])
            ->orderBy(new Expression('-category desc, `order` asc'));
    }
}
