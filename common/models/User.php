<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use yii\base\Security;
use backend\models\Role;
use backend\models\Status;
use backend\models\UserType;
use frontend\models\Profile;
use frontend\models\Client;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role_id
 * @property integer $user_type_id
 * @property integer $status_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * behaviors
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * validation rules
     */
    public function rules()
    {
        return [
            ['status_id', 'default', 'value' => self::STATUS_ACTIVE],
            [['status_id'], 'in', 'range' => array_keys($this->getStatusList())],

            ['role_id', 'default', 'value' => 10],
            [['role_id'], 'in', 'range' => array_keys($this->getRoleList())],

            ['user_type_id', 'default', 'value' => 10],
            [['user_type_id'], 'in', 'range' => array_keys($this->getUserTypeList())],

            [['username', 'email'], 'required'],
            [['username', 'email'], 'unique'],
            [['username', 'email'], 'filter', 'filter' => 'trim'],

            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'email'],


        ];
    }

    /**
     * Sets Labels for attributes
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
        ];
    }

    /**
     * Finds Identity
     *
     * @param int|string $id
     * @return null|static
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds identity by access token
     *
     * @param mixed $token
     * @param null $type
     * @return null|static
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status_id' => self::STATUS_ACTIVE]);
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

        return static::findOne(['password_reset_token' => $token, 'status_id' => self::STATUS_ACTIVE,]);
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
     * Get Primary Key
     *
     * @return mixed
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
     * Validates Auth Key
     *
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
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

    /**
     * Get role relationship
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['role_value' => 'role_id']);
    }

    /**
     * Get current user role name
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->role ? $this->role->role_name : '-no role-';
    }

    /**
     * Get array for generating roles dropdown
     *
     * @return array
     */
    public function getRoleList()
    {
        $droption = Role::find()->asArray()->all();
        return ArrayHelper::map($droption, 'role_value', 'role_name');
    }

    /**
     * Get relation to Status model
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['status_value' => 'status_id']);
    }

    /**
     * Get status name
     *
     * @return string
     */
    public function getStatusName()
    {
        return $this->status ? $this->status->status_name : '-no status-';
    }

    /**
     * Get array for generating status dropdown
     *
     * @return array
     */
    public function getStatusList()
    {
        $droption = Status::find()->asArray()->all();
        return ArrayHelper::map($droption, 'status_value', 'status_name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['user_type_value' => 'user_type_id']);
    }

    /**
     * @return string
     */
    public function getUserTypeName()
    {
        return $this->userType ? $this->userType->user_type_name : '-no user type-';
    }

    /**
     * @return array
     */
    public function getUserTypeList()
    {
        $droption = UserType::find()->asArray()->all();
        return ArrayHelper::map($droption, 'user_type_value', 'user_type_name');
    }

    /**
     * @return string
     */
    public function getUserTypeId()
    {
        return $this->userType ? $this->userType->id : 'none';
    }

    /**
     * Get current user profile
     *
     * @return \yii\db\ActiveQuery
     */

    public function getClients()
    {
        return $this->hasMany(Client::className(), ['user_id' => 'id']);
    }

    /**
     * Get relation with profile table
     *
     * @return object Profile
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id', 'id']);
    }
}
