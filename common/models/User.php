<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Security;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $balance
 * @property string $avatar
 * @property int $place_id
 * @property string $description
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email_confirm_token
 * @property string $role
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $password_field;
    public $avatar_field;

    const STATUS_DELETED    = 0;
    const STATUS_BLOCKED    = 5;
    const STATUS_INACTIVE   = 7;
    const STATUS_ACTIVE     = 10;

    const ROLE_ADMIN    = 'admin';
    const ROLE_MANAGER  = 'manager';
    const ROLE_OWNER    = 'owner';
    const ROLE_USER     = 'user';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'auth_key', 'password_hash', 'role'], 'required'],
            [['password_field'], 'required', 'on' => 'create'],
            [['balance'], 'number'],
            [['place_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['email', 'name', 'avatar', 'password_hash', 'password_reset_token', 'email_confirm_token', 'role', 'password_field', 'avatar_field'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
        ];
    }

    public function getIsAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function getIsManager()
    {
        return $this->role == self::ROLE_MANAGER;
    }

    public function getIsOwner()
    {
        return $this->role == self::ROLE_OWNER;
    }

    public function getIsUser()
    {
        return $this->role == self::ROLE_USER;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'ФИО',
            'balance' => 'Баланс',
            'avatar' => 'Аватар',
            'avatar_field' => 'Аватар',
            'place_id' => 'Заведение',
            'description' => 'Описание',
            'auth_key' => 'Auth Key',
            'password_field' => 'Пароль',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email_confirm_token' => 'Email Confirm Token',
            'role' => 'Роль',
            'status' => 'Статус',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
    * Statuses
    */
    public function getStatusName() {
        switch ($this->status) {
            case self::STATUS_DELETED:
                return 'Удален';
                break;
            case self::STATUS_BLOCKED:
                return 'Заблокирован';
                break;
            case self::STATUS_INACTIVE:
                return 'Неактивен';
                break;
            case self::STATUS_ACTIVE:
                return 'Активен';
                break;
            default:
                return '-';
                break;
        }
    }

    public function getStatusArr() {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_BLOCKED => 'Заблокирован',
        ];
    }

    /**
    * Roles
    */
    public function getRoleName() {
        switch ($this->role) {
            case self::ROLE_ADMIN:
                return 'Администратор';
                break;
            case self::ROLE_MANAGER:
                return 'Менеджер';
                break;
            case self::ROLE_OWNER:
                return 'Владелец';
                break;
            case self::ROLE_USER:
                return 'Пользователь';
                break;
            default:
                return '-';
                break;
        }
    }

    public function getRoleArr() {
        return [
            self::ROLE_USER => 'Пользователь',
            self::ROLE_OWNER => 'Владелец',
            self::ROLE_MANAGER => 'Менеджер',
            self::ROLE_ADMIN => 'Администратор',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by login
     *
     * @param string $login
     * @return static|null
     */
    public static function findBackendUser($login)
    {
        return static::find()->where(['email' => $login, 'status' => self::STATUS_ACTIVE])->andWhere(['in', 'role', [self::ROLE_ADMIN, self::ROLE_MANAGER]])->one();
    }

    public static function findFrontendUser($login)
    {
        return static::findOne(['email' => $login, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
