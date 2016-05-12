<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientPurpose */

$this->title = 'Добавить цель визита';
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-purpose-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
