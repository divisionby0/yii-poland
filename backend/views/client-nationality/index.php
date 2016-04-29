<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClientNationalitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Nationalities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-nationality-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Client Nationality', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nationality_id',
            'nationality',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
