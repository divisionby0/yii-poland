<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientState */

$this->title = 'Добавить состояние заявки';
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-state-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
