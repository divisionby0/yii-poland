<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientStatus */

$this->title = 'Обновить статус клиента: ' . $model->status;
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->status, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="client-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
