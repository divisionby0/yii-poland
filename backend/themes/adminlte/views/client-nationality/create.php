<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ClientNationality */

$this->title = 'Добавить национальность';
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-nationality-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
