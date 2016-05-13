<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

use backend\models\client\ClientStatus;
use backend\models\client\ClientPurpose;
use backend\models\client\ClientNationality;
use backend\models\client\ClientState;
use backend\models\client\ClientPpva;

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
 * @property string $description
 * @property string $price
 * @property integer $client_state_id
 * @property integer $desired_date_start
 * @property integer $desired_date_end
 * @property string $register_date
 * @property string $register_time
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ClientStatus $clientStatus
 * @property string $clientStatusName
 * @property array $clientStatusList
 *
 * @property ClientPurpose $clientPurpose
 * @property string $clientPurposeName
 * @property array $clientPurposeList
 *
 * @property ClientNationality $clientNationality
 * @property string $clientNationalityName
 * @property array $clientNationalityList
 *
 * @property ClientState $clientState
 * @property string $clientStateName
 * @property array $clientStateList
 *
 * @property array $ppvaList
 *
 * @property User $user
 * @property array $userList
 */
class Client extends \yii\db\ActiveRecord
{

    protected $hasPpvas = [];

    /**
     * Table name
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * Set behaviors
     *
     * @return array
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'status_id', 'birthdate', 'purpose_id', 'email', 'password', 'ptn', 'passport_num', 'passport_expire', 'back_date', 'nationality_id'], 'required', 'message' => 'Это поле не может быть пустым'],
            [['purpose_id', 'nationality_id', 'client_state_id', 'user_id'], 'integer'],
            [['client_state_id'], 'default', 'value' => 1],
            [['user_id'], 'default', 'value' => Yii::$app->user->getId()],
            [['created_at', 'updated_at', 'hasPpvas'], 'safe'],
            ['email', 'email'],

            ['password', 'string', 'min' => 9, 'max' => 15, 'message' => 'Пароль должен содержать минимум 9 символов и не более 15'],

            ['email', 'unique', 'message' => 'Клиент с таким email уже существует'],
            ['ptn', 'unique', 'message' => 'Клиент с таким ПТН уже существует'],
            ['passport_num', 'unique', 'message' => 'Клиент с таким номером паспорта уже существует'],

            [['first_name', 'last_name', 'email'], 'string', 'max' => 255],
            [['status_id', 'birthdate', 'passport_num', 'passport_expire', 'desired_date_start', 'desired_date_end', 'back_date', 'register_date', 'price'], 'string', 'max' => 10],
            [['ptn'], 'string', 'max' => 14],
            [['register_time'], 'string', 'max' => 5],
            [['client_state_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientState::className(), 'targetAttribute' => ['client_state_id' => 'id']],
            // TODO add rules for status, state, nationality and purpose
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
            'clientPurposeName' => 'Цель визита',
            'email' => 'Email',
            'password' => 'Пароль',
            'ptn' => 'ПТН',
            'passport_num' => 'Номер паспорта',
            'passport_expire' => 'Паспорт действителен до',
            'back_date' => 'Дата возвращения',
            'nationality_id' => 'Национальность',
            'price' => 'Сумма',
            'clientNationalityName' => 'Национальность',
            'description' => 'Дополнительная информация',
            'client_state_id' => 'Состояние заявки',
            'clientStateName' => 'Состояние заявки',
            'desired_date_start' => 'Желаемая дата подачи от:',
            'desired_date_end' => 'Желаемая дата подачи до:',
            'register_date' => 'Дата подачи документов',
            'register_time' => 'Время подачи документов',
            'user_id' => 'Агент',
            'userName' => 'Имя агента',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ppvaList' => 'ППВА',
            'hasPpvas' => 'ППВА',
            'hasPpvasString' => 'Список ППВА',
        ];
    }

    public function getClientFullName()
    {
        return $this->first_name . " " . $this->last_name;
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
     * Get relation to Client Purpose table
     *
     * @return object ClientPurpose
     */
    public function getClientPurpose()
    {
        return $this->hasOne(ClientPurpose::className(), ['id' => 'purpose_id']);
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

    /**
     * Get relation to client-nationality table
     *
     * @return object ClientNationality
     */
    public function getClientNationality()
    {
        return $this->hasOne(ClientNationality::className(), ['nationality_id' => 'nationality_id']);
    }

    /**
     * Get Client nationality name
     *
     * @return string
     */
    public function getClientNationalityName()
    {
        return $this->clientNationality ? $this->clientNationality->nationality : '-';
    }

    /**
     * Get Client status list for dropdown
     *
     * @return array
     */
    public function getClientNationalityList()
    {
        $droption = ClientNationality::find()->where(['is_active' => 1])->asArray()->all();
        return ArrayHelper::map($droption, 'nationality_id', 'nationality');
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
     * Get relation with user table
     *
     * @return object User
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Get user full name
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->user ? $this->user->first_name . ' ' . $this->user->last_name : '-';
    }

    /**
     * Get User list for dropdown
     *
     * @return array
     */
    public function getUserList()
    {
        $droption = User::find()->all();
        return ArrayHelper::map($droption, 'id',
            function ($droption, $default_value)
            {
                return $droption->getFullName();
            }
        );
    }

    public function setHasPpvas(array $hasPpvas)
    {
        $this->hasPpvas = $hasPpvas;
    }

    public function getHasPpvas()
    {
        if(!count($this->hasPpvas)) {
            return $this->hasPpvas = ArrayHelper::getColumn($this->getPpvas()->all(), 'ppva_id');
        } else {
            return $this->hasPpvas;
        }
    }

    public function getPpvas()
    {
        return $this->hasMany(ClientPpva::className(), ['ppva_id' => 'ppva_id'])
            ->viaTable('client_has_ppva', ['client_id' => 'id']);
    }

//    public function getPpvaName($ppva_id)
//    {
//        $ppva = ClientPpva::find()->where(['ppva_id' => $ppva_id])->one();
//        return $ppva->ppva;
//    }

    public function getHasPpvasString()
    {
        $ppva_array = [];
        foreach ($this->ppvas as $ppva) {
            $ppva_array[] = $ppva->ppva;
        }
        return implode(',<br>', $ppva_array);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->updateHasPpvas();
        parent::afterSave($insert, $changedAttributes);
    }

    public function updateHasPpvas()
    {
        ClientHasPpva::deleteAll(array('client_id' => $this->id));
        foreach ($this->hasPpvas as $ppva_id) {
            $clientHasPpva = new ClientHasPpva();
            $clientHasPpva->client_id = $this->id;
            $clientHasPpva->ppva_id = $ppva_id;
            $clientHasPpva->save();
        }
    }

    /**
     * Get PPVA list for dropdown
     *
     * @return array
     */
    public function getPpvaList()
    {
        $droption = ClientPpva::find()->where(['is_active' => 1])->asArray()->all();
        return ArrayHelper::map($droption, 'ppva_id', 'ppva');
    }
}
