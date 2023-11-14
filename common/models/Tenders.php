<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tenders".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property string $amount
 * @property string $date
 */
class Tenders extends \yii\db\ActiveRecord
{
    public $title;
    public $description;

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
    public static function tableName()
    {
        return 'tenders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['date'], 'safe'],
            [['title_ru', 'title_uz', 'title_en', 'amount'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Название Ru',
            'title_uz' => 'Название Uz',
            'title_en' => 'Название En',
            'description_ru' => 'Описание Ru',
            'description_uz' => 'Описание Uz',
            'description_en' => 'Описание En',
            'amount' => 'Сумма',
            'date' => 'Дата',
        ];
    }
}
