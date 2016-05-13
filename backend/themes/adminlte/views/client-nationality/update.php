<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClientNationality */

$this->title = 'Update Client Nationality: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client Nationalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-nationality-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
