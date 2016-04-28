<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client_state".
 *
 * @property integer $id
 * @property string $client_state
 *
 * @property Client[] $clients
 */
class ClientState extends \yii\db\ActiveRecord
{
    /**
     * Table name
     */
    public static function tableName()
    {
        return 'client_state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_state'], 'required'],
            [['client_state'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_state' => 'Состояние заявки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['client_state_id' => 'id']);
    }
}
