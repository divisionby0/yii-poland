<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientStatus */

$this->title = 'Create Client Status';
$this->params['breadcrumbs'][] = ['label' => 'Client Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-status-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
