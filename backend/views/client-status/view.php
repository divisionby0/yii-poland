<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\client\ClientStatus */

$this->title = $model->status;
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-status-view">

    <h1><?= Html::encode('Статус: ' . $this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'status_id',
            'status',
        ],
    ]) ?>

</div>
