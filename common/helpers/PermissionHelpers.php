<?php

namespace common\helpers;

use yii;
use yii\web\Controller;
use yii\helpers\Url;
use common\helpers\ValueHelpers;

class PermissionHelpers
{
    /**
     * check if the user is the owner of the record
     * use Yii::$app->user->identity->id for $userid, 'string' for model name
     * for example 'profile' will check the profile model to see if the user
     * owns the record. Provide the model instance, typically as $model->id as
     * the last parameter. Returns true or false, so you can wrap in if statement
     *
     * @param mixed $userid
     * @param mixed $model_name
     * @param mixed $model_id
     * @return boolean
     */
    public static function userMustBeOwner($model_name, $model_id)
    {
        $connection = \Yii::$app->db;
        $user_id = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id=:user_id AND id=:model_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(':user_id', $user_id);
        $command->bindValue(':model_id', $model_id);
        if ($result = $command->queryOne()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @requireStatus
     * @param mixed $status_name
     * @return boolean
     */
    public static function requireStatus($status_name)
    {
        if(Yii::$app->user->identity->status_id == ValueHelpers::getStatusValue($status_name)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @requireMinimumStatus
     * @param mixed $status_name
     * @return boolean
     */
    public static function requireMinimumStatus($status_name)
    {
        if(Yii::$app->user->identity->status_id >= ValueHelpers::getStatusValue($status_name)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @requireRole
     * @param mixed $role_name
     */
    public static function requireRole($role_name)
    {
        if(Yii::$app->user->identity->role_id == ValueHelpers::getRoleValue($role_name)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @requireMinimumRole
     * @param mixed $role_name
     */
    public static function requireMinimumRole($role_name)
    {
        if(Yii::$app->user->identity->role_id >= ValueHelpers::getRoleValue($role_name)){
            return true;
        } else {
            return false;
        }
    }
}
