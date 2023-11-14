<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "vote_result".
 *
 * @property int $id
 * @property string $first
 * @property string $first_comment
 * @property string $second
 * @property string $second_comment
 * @property string $third_comment
 * @property string $date
 */
class VoteResult extends \yii\db\ActiveRecord
{
    public $reCaptcha;

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
        return 'vote_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first', 'second', 'third_comment'], 'required'],
            [['first_comment', 'second_comment', 'third_comment'], 'string'],
            [['first_comment', 'second_comment'], 'string', 'max' => 500],
            [['date'], 'safe'],
            [['first', 'second'], 'string', 'max' => 255],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'uncheckedMessage' => Yii::t('main', 'Пожалуйста, подтвердите, что вы не бот'),
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first' => '',
            'first_comment' => '',
            'second' => '',
            'second_comment' => '',
            'third_comment' => '',
            'date' => 'Date',
        ];
    }
}
