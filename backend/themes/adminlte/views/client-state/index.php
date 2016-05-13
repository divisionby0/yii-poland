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

            ['class' => 'common\components\ActionColumn'],
        ],
    ]); ?>
</div>
