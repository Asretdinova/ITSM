<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $full_name
 * @property string $mail
 * @property string $phone
 * @property string $text
 * @property string $date
 */
class Feedback extends \yii\db\ActiveRecord
{
    public $reCaptcha;

    const SCENARIO_SIMPLE = 'simple';

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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
            return [
                [['full_name', 'text', 'mail'], 'required', 'on' => self::SCENARIO_DEFAULT],
                [['full_name', 'mail'], 'required', 'on' => self::SCENARIO_SIMPLE],
                [['text'], 'string'],
                [['date'], 'safe'],
                [['full_name', 'mail', 'phone'], 'string', 'max' => 255],

                [['mail'], 'email'],
                [['phone'], 'match', 'pattern' => '/^\+998 \d{2} \d{3}-\d{2}-\d{2}$/i', 'message' => Yii::t('main', 'Неправильный формат номера телефона')],
                [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                    'uncheckedMessage' => Yii::t('main', 'Пожалуйста, подтвердите, что вы не бот'),
                    'on' => self::SCENARIO_DEFAULT
                ]
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID номер'),
            'full_name' => Yii::t('main', 'Ф.И.О.'),
            'mail' => Yii::t('main', 'Эл. почта'),
            'phone' => Yii::t('main', 'Телефон'),
            'text' => Yii::t('main', 'Сообщения'),
            'date' => Yii::t('main', 'Дата'),
        ];
    }
}
