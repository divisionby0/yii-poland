<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ClientPpva */

$this->title = 'Создать ППВА';
$this->params['breadcrumbs'][] = ['label' => 'Список ППВА', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-ppva-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
