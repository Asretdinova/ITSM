<?php

namespace common\models;

use frontend\models\Utils;
use paulzi\jsonBehavior\JsonBehavior;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $photo
 * @property string $name_ru
 * @property string $name_uz
 * @property string $name_en
 * @property string $position_ru
 * @property string $position_uz
 * @property string $position_en
 * @property int $order
 * @property int $is_active
 * @property int $category
 * @property string $phone
 * @property string $mail
 * @property string $reception_days_ru
 * @property string $reception_days_uz
 * @property string $reception_days_en
 * @property string $projects_list
 * @property integer $department_id
 */
class Team extends BaseModel
{
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DEPARTMENT_MEMBER = 'dp_member';

    const CATEGORY_HEAD = 1;
    const CATEGORY_MANAGER = 2;
    const CATEGORY_DEPARTMENT_HEAD = 3;

    public $file;
    public $name;
    public $position;
    public $reception_days;

    public $imageSize = [
        'width' => 700,
        'height' => 700,
    ];

    public function behaviors() {
        return [
            [
                'class' => JsonBehavior::className(),
                'attributes' => ['projects_list'],
            ],
        ];
    }

    public function afterFind()
    {
        $this->name = $this->{'name_' . Yii::$app->language};
        $this->position = $this->{'position_' . Yii::$app->language};
        $this->reception_days = $this->{'reception_days_' . Yii::$app->language};

        if (!is_array($this->projects_list))
            $this->projects_list = Json::decode($this->projects_list);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order', 'is_active', 'category', 'department_id'], 'integer'],
            [['photo', 'name_ru', 'name_uz', 'name_en', 'position_ru', 'position_uz', 'position_en', 'phone', 'mail', 'reception_days_ru', 'reception_days_uz', 'reception_days_en'], 'string', 'max' => 255],
            [['name_ru', 'name_uz', 'name_en', 'order'], 'required'],
            [['projects_list'], 'safe'],
            [['mail'], 'email'],
            [['file'], 'file', 'extensions' => 'jpg'],
//            [['file'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file'], 'safe', 'on' => self::SCENARIO_UPDATE],
            [['department_id'], 'required', 'on' => self::SCENARIO_DEPARTMENT_MEMBER],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'file' => Yii::t('main', 'Фото'),
            'photo' => Yii::t('main', 'Фото'),
            'name_ru' => Yii::t('main', 'Имя на русском'),
            'name_uz' => Yii::t('main', 'Имя на узбекском'),
            'name_en' => Yii::t('main', 'Имя на английском'),
            'position_ru' => Yii::t('main', 'Должность на русском'),
            'position_uz' => Yii::t('main', 'Должность на узбекском'),
            'position_en' => Yii::t('main', 'Должность на английском'),
            'order' => Yii::t('main', 'Порядок'),
            'is_active' => Yii::t('main', 'Статус'),
            'category' => Yii::t('main', 'Категория'),
            'phone' => Yii::t('main', 'Телефон'),
            'mail' => Yii::t('main', 'Mail'),
            'reception_days' => Yii::t('main', 'Дни приема'),
            'reception_days_ru' => Yii::t('main', 'Дни приема на русском'),
            'reception_days_uz' => Yii::t('main', 'Дни приема на узбекском'),
            'reception_days_en' => Yii::t('main', 'Дни приема на английском'),
            'projects_list' => Yii::t('main', 'Проекты'),
            'department_id' => Yii::t('main', 'Отдел'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if (empty($this->file))
                return true;

            $this->photo = Yii::$app->security->generateRandomString(32);
            $path = Yii::getAlias("@frontend/web/uploads/content/{$this->photo}.jpg");
            if ($this->file->saveAs($path)) {
                $this->file = $this->photo;
                Utils::resizeImage($path, $this->imageSize['width'], $this->imageSize['height']);
                return true;
            }

            return false;
        } else {
            return false;
        }
    }

    public function getInfo()
    {
        return $this->hasMany(TeamInfo::className(), ['member_id' => 'id'])->orderBy(['order' => SORT_ASC]);
    }
}
