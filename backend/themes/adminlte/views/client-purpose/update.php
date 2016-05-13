<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientPurpose */

$this->title = 'Изменить цель визита: ' . $model->purpose;
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purpose, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="client-purpose-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
