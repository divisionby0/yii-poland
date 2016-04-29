<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

use common\models\User;

class UserCreateForm extends ActiveRecord
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $role_id;
    public $roleList;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'email', 'password'], 'required'],
            [['username', 'first_name', 'last_name', 'email'], 'filter', 'filter' => 'trim'],

            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['role_id', 'default', 'value' => 10],
            [['role_id'], 'in', 'range' => array_keys(ArrayHelper::map(Role::find()->asArray()->all(), 'role_value', 'role_name'))],

            ['password', 'string', 'min' => 6],
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
            'username' => 'Логин',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Email',
            'password' => 'Пароль',
            'role_id' => 'Роль',
        ];
    }

    /**
     * Create user.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function create()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}