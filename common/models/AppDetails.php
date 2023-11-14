<?php

namespace common\models;

use frontend\models\Utils;
use Yii;

/**
 * This is the model class for table "app_details".
 *
 * @property int $id
 * @property string $goal_ru
 * @property string $goal_uz
 * @property string $goal_en
 * @property string $result_ru
 * @property string $result_uz
 * @property string $result_en
 * @property string $screen
 * @property int $order
 * @property int $category_id
 * @property int $project_id
 */
class AppDetails extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    public $file;

    public $goal;
    public $result;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_details';
    }

    public function afterFind()
    {
        $this->goal = $this->{'goal_' . Yii::$app->language};
        $this->result = $this->{'result_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['goal_ru', 'goal_uz', 'goal_en', 'result_ru', 'result_uz', 'result_en', 'order', 'category_id'], 'required'],
            [['goal_ru', 'goal_uz', 'goal_en', 'result_ru', 'result_uz', 'result_en'], 'string'],
            [['order', 'category_id', 'project_id'], 'integer'],
            [['screen'], 'string', 'max' => 255],
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
            'id' => 'ID',
            'goal_ru' => 'Цель Ru',
            'goal_uz' => 'Цель Uz',
            'goal_en' => 'Цель En',
            'result_ru' => 'Резултат RU',
            'result_uz' => 'Резултат Uz',
            'result_en' => 'Резултат En',
            'screen' => 'Скыншот',
            'order' => 'Порядковый номер',
            'category_id' => 'Категория',
            'project_id' => 'ИД проекта',
        ];
    }

    public static function categories($id = null) {
        $list = [
            1 => 'Web-sites',
            2 => 'Apps',
            3 => 'Corporate identity',
            4 => 'Presentations',
            5 => 'Promotion'
        ];

        if (is_null($id))
            return $list;

        return @$list[$id];

    }

    public function upload()
    {
        if ($this->validate()) {
            $this->screen = Yii::$app->security->generateRandomString(32);
            $path = Yii::getAlias("@frontend/web/uploads/content/{$this->screen}.jpg");
            if ($this->file->saveAs($path)) {
                $this->file = $this->screen;
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}
