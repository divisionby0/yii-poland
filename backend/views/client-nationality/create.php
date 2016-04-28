<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ClientNationality */

$this->title = 'Create Client Nationality';
$this->params['breadcrumbs'][] = ['label' => 'Client Nationalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-nationality-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
