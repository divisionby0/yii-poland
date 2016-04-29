<?php

namespace backend\models\client;

use Yii;

/**
 * This is the model class for table "client_purpose".
 *
 * @property integer $id
 * @property integer $purpose_id
 * @property string $purpose
 */
class ClientPurpose extends \yii\db\ActiveRecord
{
    /**
     * Table name
     */
    public static function tableName()
    {
        return 'client_purpose';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purpose_id', 'purpose'], 'required'],
            [['purpose_id'], 'integer'],
            [['purpose'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purpose_id' => 'Purpose ID',
            'purpose' => 'Purpose',
        ];
    }

    public function getClients()
    {
        return $this->hasMany(Client::className(), ['purpose_id' => 'purpose_id']);
    }
}
