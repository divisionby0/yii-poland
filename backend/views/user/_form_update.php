<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use common\helpers\PermissionHelpers;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form row">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm-6">
        <?= $form->field($model, 'username')->textInput(['readonly' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    </div>
    <?php
    if(PermissionHelpers::requireMinimumRole('Администратор')) {
        ?>
        <div class="col-sm-6">
            <?= $form->field($model, 'role_id')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'status_id')->textInput() ?>
        </div>
        <?php
    }
    ?>
    <div class="col-sm-6">
        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
