<?php

namespace backend\models\client;

use frontend\models\Client;
use Yii;

/**
 * This is the model class for table "client_status".
 *
 * @property integer $id
 * @property string $status_id
 * @property string $status
 */
class ClientStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id', 'status'], 'required'],
            [['status_id', 'status'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'Идентификатор статуса',
            'status' => 'Статус',
        ];
    }

    public function getClients()
    {
        return $this->hasMany(Client::className(), ['$status_id' => '$status_id']);
    }
}
