<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ClientPpva */

$this->title = $model->ppva;
$this->params['breadcrumbs'][] = ['label' => 'Список ППВА', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-ppva-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ppva_id',
            'ppva',
        ],
    ]) ?>

</div>
