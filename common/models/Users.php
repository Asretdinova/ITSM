<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $role
 * @property int $is_active
 * @property string $registration_date
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLE_CONTROLLER = 'controller';
    const ROLE_CONTENT_MANAGER = 'content_manager';

    public $roles = [
        self::ROLE_USER,
        self::ROLE_CONTENT_MANAGER,
        self::ROLE_CONTROLLER,
        self::ROLE_ADMIN
    ];

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'registration_date',
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
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'name'], 'required'],
            [['role'], 'string'],
            [['is_active'], 'boolean'],
            [['registration_date'], 'safe'],
            [['username', 'password', 'name'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID номер',
            'username' => 'Имя пользователя (login)',
            'password' => 'Пароль',
            'name' => 'Ф.И.О.',
            'role' => 'Роль',
            'is_active' => 'Статус',
            'registration_date' => 'Дата регистрации',
        ];
    }

    public function getUserLevel()
    {
        return array_search($this->role, $this->roles);
    }

    public function getRoleId($role)
    {
        return array_search($role, $this->roles);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::find()->where(['id' => $id, 'is_active' => true])->andWhere(['<>', 'role', self::ROLE_USER])->one();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {}

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return true;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }
}
