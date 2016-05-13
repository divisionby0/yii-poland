<?php
use yii\helpers\Html;
?>

<?php
if (Yii::$app->user->isGuest) {
    ?>

    <?php
} else {
    ?>
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?= Html::img($directoryAsset . '/img/user-admin-male-01.png', [
                'class' => 'user-image',
                'alt' => 'User Image'
            ]) ?>
            <span class="hidden-xs"><?=  Yii::$app->user->identity->fullName ?></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <?= Html::img($directoryAsset . '/img/user-admin-male-01.png', [
                    'class' => 'img-circle',
                    'alt' => 'User Image'
                ]) ?>
                <p>
                    <strong><?=  Yii::$app->user->identity->fullName ?></strong><br>
                    <?=  Yii::$app->user->identity->roleName ?>
                    <small>Member since Nov. 2012</small>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <?php
                    echo  Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Выйти',
                            ['class' => 'btn btn-default btn-flat']
                        )
                        . Html::endForm()
                    ?>
                </div>
            </li>
        </ul>
    </li>
    <?php
}
?>