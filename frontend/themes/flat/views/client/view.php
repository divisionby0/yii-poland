<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Client */

$this->title = $model->clientFullName;
$this->params['breadcrumbs'][] = ['label' => $index_label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить данные', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'first_name',
            'last_name',
            'status_id',
            'birthdate',
            'clientPurposeName',
            'email:email',
            'password',
            'ptn',
            'passport_num',
            'passport_expire',
            'back_date',
            'clientNationalityName',
            'price',
            'desired_date_start',
            'desired_date_end',
            'clientStateName',
            'register_date',
            'register_time',
            [
                'attribute' => 'hasPpvasString',
                'format' => 'raw'
            ],
            'userName',
        ],
    ]) ?>

</div>
