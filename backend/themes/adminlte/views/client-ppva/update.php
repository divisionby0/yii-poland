<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClientPpva */

$this->title = 'Update Client Ppva: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client Ppvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-ppva-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
