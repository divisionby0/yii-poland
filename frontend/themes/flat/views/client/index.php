<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $index_label;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model)
        {
            if ($model->client_state_id == 3 || $model->client_state_id == 4) {
                return ['class' => 'danger'];
            } elseif ($model->client_state_id == 5) {
                return ['class' => 'success'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'first_name',
            'last_name',
            //'status_id',
            //'birthdate',
            [
                'attribute' => 'user_id',
                'value' => 'userName',
            ],
            [
                'attribute' => 'client_state_id',
                'value' => 'clientStateName',
            ],
            [
                'attribute' => 'hasPpvasString',
                'format' => 'raw',
                'headerOptions' => ['class' => 'ppva-column']
            ],
            // 'purpose_id',
            // 'email:email',
            // 'password',
            // 'ptn',
            // 'passport_num',
            // 'passport_expire',
            // 'back_date',
            // 'nationality_id',
            // 'client_state_id',
            // 'register_date',
            // 'register_time',
            // 'user_id',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'common\components\ActionColumn',
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>
</div>
