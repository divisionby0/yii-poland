<?php

//namespace backend\models;
namespace backend\models\client;

use frontend\models\Client;
use Yii;

/**
 * This is the model class for table "client_nationality".
 *
 * @property integer $id
 * @property integer $nationality_id
 * @property string $nationality
 */
class ClientNationality extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_nationality';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nationality_id', 'nationality'], 'required'],
            [['nationality_id'], 'integer'],
            [['nationality'], 'string', 'max' => 65],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nationality_id' => 'Nationality ID',
            'nationality' => 'Nationality',
        ];
    }

    public function getClients()
    {
        return $this->hasMany(Client::className(), ['nationality_id' => 'nationality_id']);
    }
}
