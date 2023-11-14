<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "team_info".
 *
 * @property int $id
 * @property int $member_id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property int $order
 * @property string $date
 */
class TeamInfo extends \yii\db\ActiveRecord
{
    public $title;
    public $description;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team_info';
    }

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
        $this->description = $this->{'description_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'required'],
            [['member_id', 'order'], 'integer'],
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['date'], 'safe'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'title_ru' => Yii::t('main', 'Названия на русском'),
            'title_uz' => Yii::t('main', 'Названия на узбекском'),
            'title_en' => Yii::t('main', 'Названия на английском'),
            'description_ru' => Yii::t('main', 'Описания на русском'),
            'description_uz' => Yii::t('main', 'Описания на узбекском'),
            'description_en' => Yii::t('main', 'Описания на английском'),
            'order' => 'Порядковый номер',
            'date' => Yii::t('main', 'Дата'),
        ];
    }
}
