<?php

namespace common\models;

use frontend\helpers\UtilHelper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $author_name
 * @property string $author_surname
 * @property string $mail
 * @property string $comment
 * @property string $date
 * @property int $idea_id
 * @property int $is_active
 * @property string $user_details
 */
class Comments extends \yii\db\ActiveRecord
{

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

    public function beforeSave($insert)
    {
        if ($insert) {
            $browser = UtilHelper::getBrowser();

            $data = [
                'ip' => Yii::$app->request->getRemoteIP(),
                'browser' => [
                    'user_agent' => $browser['userAgent'],
                    'name' => $browser['name'],
                    'version' => $browser['version'],
                    'platform' => $browser['platform']
                ]
            ];

            $this->user_details = json_encode($data);
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment', 'author_name', 'author_surname', 'mail'], 'required'],
            [['comment', 'user_details'], 'string'],
            [['date'], 'safe'],
            [['mail'], 'email'],
            [['idea_id', 'is_active'], 'integer'],
            [['comment'], 'string', 'max' => 2000],
            [['author_name', 'author_surname', 'mail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID номер'),
            'author_name' => Yii::t('main', 'Имя'),
            'author_surname' => Yii::t('main', 'Фамилия'),
            'mail' => Yii::t('main', 'Электронная почта'),
            'comment' => Yii::t('main', 'Комментария'),
            'date' => Yii::t('main', 'Дата'),
            'idea_id' => Yii::t('main', 'Идея'),
            'is_active' => Yii::t('main', 'Статус'),
            'user_details' => Yii::t('main', 'Информация о пользователе'),
        ];
    }

    public static function countUnreadables()
    {
        return self::find()->where(['is_active' => false])->count();
    }
}
