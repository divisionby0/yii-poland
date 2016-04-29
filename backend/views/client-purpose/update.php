<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientPurpose */

$this->title = 'Update Client Purpose: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client Purposes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-purpose-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
