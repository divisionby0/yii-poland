<?php
namespace common\models;

use common\helpers\ValueHelpers;
use Yii;
use yii\base\Model;
use yii\web\NotFoundHttpException;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => 'Это поле не может быть пустым'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
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
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if (
            $this->validate() &&
            $this->getUser()->status_id == ValueHelpers::getStatusValue('Active')
        ) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    public function loginAdmin()
    {
        if(
            $this->validate() &&
            $this->getUser()->role_id >= ValueHelpers::getRoleValue('Администратор') &&
            $this->getUser()->status_id == ValueHelpers::getStatusValue('Active')
        ) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            throw new NotFoundHttpException('You Shall Not Pass.');
        }
    }

    public function loginBackend()
    {
        if(
            $this->validate() &&
            $this->getUser()->role_id >= ValueHelpers::getRoleValue('Супервизор') &&
            $this->getUser()->status_id == ValueHelpers::getStatusValue('Active')
        ) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            throw new NotFoundHttpException('You Shall Not Pass.');
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
