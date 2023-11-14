<?php

namespace common\models;

use frontend\helpers\UtilHelper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "ideas".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $author_name
 * @property string $author_surname
 * @property string $mail
 * @property string $phone
 * @property string $date
 * @property int $likes
 * @property int $views
 * @property string $file
 * @property string $reason
 * @property string $status
 * @property string $implementation
 * @property string $expediency
 * @property int $category_id
 * @property bool $accept_participating
 * @property bool $accept_publishing
 * @property int $is_active
 * @property string $user_details
 *
 * @property Categories $category
 * @property Comments[] $comments
 * @property Comments $commentsCount
 */
class Ideas extends BaseModel
{
    const STATUS_NEW = 'new';
    const STATUS_REJECTED = 'rejected';
    const STATUS_PROCESS = 'process';
    const STATUS_PUBLISHED = 'published';
    const STATUS_ANNULLED = 'annulled';

    const SCENARIO_REJECT = 'reject';

    public $sort;
    public $agreement;

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
        return 'ideas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'category_id', 'mail', 'author_name', 'author_surname', 'expediency', 'implementation'], 'required'],
            [['text', 'user_details', 'status', 'reason', 'expediency', 'implementation', 'phone'], 'string'],
            [['reason'], 'required', 'on' => self::SCENARIO_REJECT],
            [['date', 'sort', 'agreement'], 'safe'],
            [['file'], 'file'],
            [['mail'], 'email'],
            [['likes', 'views', 'category_id', 'is_active', 'accept_participating', 'accept_publishing'], 'integer'],
            [['title', 'author_name', 'author_surname', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID номер'),
            'title' => Yii::t('main', 'Название идеи'),
            'text' => Yii::t('main', 'Описание предложения'),
            'author_name' => Yii::t('main', 'Имя'),
            'author_surname' => Yii::t('main', 'Фамилия'),
            'mail' => Yii::t('main', 'E-mail'),
            'phone' => Yii::t('main', 'Телефон'),
            'date' => Yii::t('main', 'Дата'),
            'likes' => Yii::t('main', 'Нравится'),
            'views' => Yii::t('main', 'Просмотров'),
            'file' => Yii::t('main', 'Презентация идеи'),
            'presentation' => Yii::t('main', 'Презентация идеи'),
            'status' => Yii::t('main', 'Статус'),
            'reason' => Yii::t('main', 'Причина отклонения'),
            'category_id' => Yii::t('main', 'Категория'),
            'accept_participating' => Yii::t('main', 'Я бы хотел принять непосредственное участие в реализации данной идеи / предложения'),
            'accept_publishing' => Yii::t('main', 'Отправить мою идею без публикации на портале'),
            'is_active' => Yii::t('main', 'Статус'),
            'user_details' => Yii::t('main', 'Информация о пользователе'),
            'implementation' => Yii::t('main', 'Целесообразность идеи / предложения'),
            'expediency' => Yii::t('main', 'Возможные пути реализации идеи / предложения'),
            'agreement' => Yii::t('main', 'Ознакомлен(а) с офертой'),
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public static function countUnreadables()
    {
        return self::find()->where(['is_active' => false])->count();
    }

    public function getCommentsCount()
    {
        return $this->getComments()->count();
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['idea_id' => 'id'])->where(['is_active' => true]);
    }

    public function getAllIdeasCount()
    {
        return self::find()->where([])->count();
    }

    public function getProcessIdeasCount()
    {
        return self::find()->where(['status' => self::STATUS_PROCESS])->count();
    }

    public function getPublishedIdeasCount()
    {
        return self::find()->where(['status' => self::STATUS_PUBLISHED])->count();
    }

    public function getAllCommentsCount()
    {
        return Comments::find()->where(['is_active' => (int) true])->count();
    }

    public static function getStatusDefinition($currentStatus)
    {
        $status = [
            self::STATUS_NEW => 'Новое',
            self::STATUS_PROCESS => 'На рассмотрение',
            self::STATUS_PUBLISHED => 'Опубликовано',
            self::STATUS_REJECTED => 'Отклонено',
            self::STATUS_ANNULLED => 'Аннулировано',
        ];

        if ($currentStatus == 'all')
            return $status;
        if ($currentStatus == 'keys')
            return array_keys($status);
        else
            return @$status[$currentStatus];
    }

    public function getStatusBadge($addistionalClasses = '')
    {
        $status_icon = '';
        $status_text = '';

        switch ($this->status) {
            case Ideas::STATUS_PROCESS:
                $status_icon = 'fa-clock';
                $status_text = Yii::t('main', 'В рассмотрении');

                break;
            case Ideas::STATUS_PUBLISHED:
                $status_icon = 'fa-check';
                $status_text = Yii::t('main', 'Принято');

                break;
            case Ideas::STATUS_REJECTED:
                $status_icon = 'fa-times';
                $status_text = Yii::t('main', 'Отказано');

                break;
        }

        return "<span class='statusBadge badge{$this->status} {$addistionalClasses}'><i class='fas {$status_icon}'></i> {$status_text}</span>";
    }
}
