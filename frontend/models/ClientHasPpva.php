<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "client_has_ppva".
 *
 * @property integer $client_id
 * @property integer $ppva_id
 */
class ClientHasPpva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_has_ppva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'ppva_id'], 'required'],
            [['client_id', 'ppva_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'ppva_id' => 'Ppva ID',
        ];
    }
}
