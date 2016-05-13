<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\client\ClientPurposeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Цель визита';
$this->params['breadcrumbs'][] = $index_label;
?>
<div class="client-purpose-index">
    <p>
        <?= Html::a('Добавить цель визита', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'purpose_id',
            'purpose',

            ['class' => 'common\components\ActionColumn'],
        ],
    ]); ?>
</div>
