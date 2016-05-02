<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'status_id')->dropDownList($model->clientStatusList, ['prompt' => '- - -']) ?>
        </div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'birthdate')->widget(
                        DatePicker::className(), [
                        // inline too, not bad
                        //'inline' => true,
                        // modify template for custom rendering
                        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy'
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'passport_num')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'passport_expire')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'nationality_id')->dropDownList($model->clientNationalityList, ['prompt' => '- - -', 'options' => [219 => ['Selected'=>true]]]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'ptn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'purpose_id')->dropDownList($model->clientPurposeList, ['prompt' => '- - -']) ?>
            <?= $form->field($model, 'back_date')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'description')->textArea(['rows' => '5']) ?>
        </div>
    </div>

    <?php // $form->field($model, 'client_state_id')->textInput() ?>

    <?php // $form->field($model, 'register_date')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'register_time')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'user_id')->dropDownList($model->userList, ['prompt' => '- - -']) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
