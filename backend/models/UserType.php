<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property integer $id
 * @property string $user_type_name
 * @property string $user_type_value
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type_name', 'user_type_value'], 'required'],
            [['user_type_name'], 'string', 'max' => 45],
            [['user_type_value'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type_name' => 'Type Name',
            'user_type_value' => 'Type Value',
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_type_is' => 'user_type_value']);
    }
}
