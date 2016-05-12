<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientState */

$this->title = 'Обновить состояние заявки: ' . $model->client_state;
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client_state, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="client-state-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
