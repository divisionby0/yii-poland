<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\client\ClientPpvaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список ППВА';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-ppva-index">
    <p>
        <?= Html::a('Добавить ППВА', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ppva_id',
            'ppva',

            ['class' => 'common\components\ActionColumn'],
        ],
    ]); ?>
</div>
