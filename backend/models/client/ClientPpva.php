<?php

namespace backend\models\client;

use Yii;

use frontend\models\Client;

/**
 * This is the model class for table "client_ppva".
 *
 * @property integer $id
 * @property integer $ppva_id
 * @property string $ppva
 */
class ClientPpva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_ppva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppva_id', 'ppva'], 'required'],
            [['ppva_id'], 'integer'],
            [['ppva'], 'string', 'max' => 65],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppva_id' => 'Идентификатор ППВА',
            'ppva' => 'Название ППВА',
        ];
    }

    /**
     * Get relation with Client model
     *
     * @return $this
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['id' => 'client_id'])
            ->viaTable('client_has_ppva', ['ppva_id' => 'ppva_id']);
    }
}
