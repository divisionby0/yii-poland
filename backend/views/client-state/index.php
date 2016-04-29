<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\client\ClientStateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $index_label;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-state-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить состояние заявки', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_state',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
