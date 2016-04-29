<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\helpers\PermissionHelpers;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php
        if(PermissionHelpers::requireMinimumRole('Супер Админ')) {
            ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить пользователя ' . $model->getFullName() . '?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'first_name',
            'last_name',
            'email:email',
            'statusName',
            'roleName',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
