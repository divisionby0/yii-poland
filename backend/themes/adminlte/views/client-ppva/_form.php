<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClientPpva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-ppva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppva_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppva')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
