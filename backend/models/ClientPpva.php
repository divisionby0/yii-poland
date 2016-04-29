<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client_ppva".
 *
 * @property integer $id
 * @property string $ppva_id
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
}
