<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientPurpose */

$this->title = 'Create Client Purpose';
$this->params['breadcrumbs'][] = ['label' => 'Client Purposes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-purpose-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
