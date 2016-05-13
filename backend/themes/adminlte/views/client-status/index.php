<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\client\ClientStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $index_label;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-status-index">
    <p>
        <?= Html::a('Добавить статус клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'status_id',
            'status',

            ['class' => 'common\components\ActionColumn'],
        ],
    ]); ?>
</div>
