<?php

namespace frontend\models;

use Yii;
use backend\models\ClientStatus;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $status_id
 * @property string $birthdate
 * @property integer $purpose_id
 * @property string $email
 * @property string $password
 * @property string $ptn
 * @property string $passport_num
 * @property string $passport_expire
 * @property string $back_date
 * @property integer $nationality_id
 * @property integer $client_state_id
 * @property string $register_date
 * @property string $register_time
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ClientStatus $clientStatus
 * @property ClientState $clientState
 * @property ClientPurpose $clientPurpose
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * Table name
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'status_id', 'birthdate', 'purpose_id', 'email', 'password', 'ptn', 'passport_num', 'passport_expire', 'back_date', 'nationality_id', 'client_state_id', 'register_date', 'register_time'], 'required'],
            [['purpose_id', 'nationality_id', 'client_state_id'], 'integer'],
            [['client_state_id'], 'default', 'value' => 1],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'email', 'password'], 'string', 'max' => 255],
            [['status_id', 'birthdate', 'passport_num', 'passport_expire', 'back_date', 'register_date'], 'string', 'max' => 10],
            [['ptn'], 'string', 'max' => 14],
            [['register_time'], 'string', 'max' => 5],
            [['client_state_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientState::className(), 'targetAttribute' => ['client_state_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'status_id' => 'Статус',
            'birthdate' => 'Дата рождения',
            'purpose_id' => 'Цель',
            'email' => 'Email',
            'password' => 'Пароль',
            'ptn' => 'ПТН',
            'passport_num' => 'Номер пасспорта',
            'passport_expire' => 'Пасспорт действителен до',
            'back_date' => 'Дата возвращения',
            'nationality_id' => 'Nationality ID',
            'client_state_id' => 'Client State ID',
            'register_date' => 'Register Date',
            'register_time' => 'Register Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Get relation with client_status table
     *
     * @return object ClientStatus
     */
    public function getClientStatus()
    {
        return $this->hasOne(ClientStatus::className(), ['status_id' => 'status_id']);
    }

    /**
     * Get Client status name
     *
     * @return string
     */
    public function getClientStatusName()
    {
        return $this->clientStatus ? $this->clientStatus->status : '-';
    }

    /**
     * Get Client status array for using in select
     *
     * @return array
     */
    public function getClientStatusList()
    {
        $droption = ClientStatus::find()->asArray()->all();
        return ArrayHelper::map($droption, 'status_id', 'status');
    }

    /**
     * Get relation to Client Order State table
     *
     * @return object ClientState
     */
    public function getClientState()
    {
        return $this->hasOne(ClientState::className(), ['id' => 'client_state_id']);
    }

    /**
     * Get Client order state name
     *
     * @return string
     */
    public function getClientStateName()
    {
        return $this->clientState ? $this->clientState->client_state : '-';
    }

    /**
     * Get Client order state array for using in select
     *
     * @return array
     */
    public function getClientStateList()
    {
        $droption = ClientState::find()->asArray()->all();
        return ArrayHelper::map($droption, 'id', 'client_state');
    }

    /**
     * Get relation to Client Purpose table
     *
     * @return object ClientPurpose
     */
    public function getClientPurpose()
    {
        return $this->hasOne(ClientPurpose::className(), ['id' => '$purpose_id']);
    }

    /**
     * Get Client purpose name
     *
     * @return string
     */
    public function getClientPurposeName()
    {
        return $this->clientPurpose ? $this->clientPurpose->purpose : '-';
    }

    /**
     * Get Client purpose array for using in select
     *
     * @return array
     */
    public function getClientPurposeList()
    {
        $droption = ClientPurpose::find()->asArray()->all();
        return ArrayHelper::map($droption, 'purpose_id', 'purpose');
    }
}
