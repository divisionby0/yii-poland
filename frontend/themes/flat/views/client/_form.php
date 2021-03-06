<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\assets\InputMaskAsset;

InputMaskAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-3">
                    <?= $form->field($model, 'status_id')->dropDownList($model->clientStatusList, ['prompt' => '- - -']) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'birthdate')->widget(
                        DatePicker::className(), [
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy'
                        ]
                    ]) ?>
                </div>
                <div class="col-sm-5">
                    <?php
                    if ($model->isNewRecord) {
                        echo $form->field($model, 'nationality_id')->dropDownList($model->clientNationalityList, ['prompt' => '- - -', 'options' => [219 => ['Selected'=>true]]]);
                    } else {
                        echo $form->field($model, 'nationality_id')->dropDownList($model->clientNationalityList, ['prompt' => '- - -']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'passport_num')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'passport_expire')->widget(
                        DatePicker::className(), [
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy'
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-mask-email', 'maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'ptn')->textInput(['class' => 'form-control form-mask-ptn', 'maxlength' => true]) ?>
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'purpose_id')->dropDownList($model->clientPurposeList, ['prompt' => '- - -', 'options' => [1 => ['Selected'=>true]]]);
            } else {
                echo $form->field($model, 'purpose_id')->dropDownList($model->clientPurposeList, ['prompt' => '- - -']);
            }
            ?>
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
            <?php
            if (!$model->isNewRecord) {
                ?>
                <?= $form->field($model, 'client_state_id')->dropDownList($model->clientStateList) ?>
                <?php
            }
            ?>
            <?= $form->field($model, 'hasPpvas')->checkboxList($model->ppvaList) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'back_date')->widget(
                DatePicker::className(), [
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])  ?>
            <?= $form->field($model, 'desired_date_start')->widget(
                DatePicker::className(), [
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])  ?>
            <?= $form->field($model, 'desired_date_end')->widget(
                DatePicker::className(), [
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])  ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'description')->textArea(['rows' => '6']) ?>
        </div>
    </div>

    <?php // $form->field($model, 'client_state_id')->textInput() ?>

    <?php // $form->field($model, 'register_date')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'register_time')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'user_id')->dropDownList($model->userList, ['prompt' => '- - -']) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
