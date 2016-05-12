<?php
/**
 * Left side column.
 * Contains the logo and sidebar
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img($directoryAsset . '/img/user-admin-male-01.png', [
                    'class' => 'img-circle',
                    'alt' => 'User Image'
                ]) ?>
            </div>
            <div class="pull-left info">
                <p><?=  Yii::$app->user->identity->fullName ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= backend\themes\adminlte\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Main Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Пользователи',
                        'icon' => 'fa fa-users',
                        'url' => Url::to(['/user']),
                        'active' => $this->context->route == 'user/index',
                    ],
                    [
                        'label' => 'Настройки',
                        'icon' => 'fa fa-gears',
                        'url' => ['#'],
                        'items' => [
                            [
                                'label' => 'Национальность',
                                'icon' => 'fa fa-flag',
                                'url' => Url::to(['/client-nationality/index']),
                                'active' => $this->context->route == 'client-nationality/index',
                            ],
                            [
                                'label' => 'ППВА',
                                'icon' => 'fa fa-flag',
                                'url' => Url::to(['/client-ppva/index']),
                                'active' => $this->context->route == 'client-ppva/index',
                            ],
                            [
                                'label' => 'Цель визита',
                                'icon' => 'fa fa-map-marker',
                                'url' => Url::to(['/client-purpose/index']),
                                'active' => $this->context->route == 'client-purpose/index',
                            ],
                            [
                                'label' => 'Статус клиента',
                                'icon' => 'fa fa-puzzle-piece',
                                'url' => Url::to(['/client-status/index']),
                                'active' => $this->context->route == 'client-status/index',
                            ],
                            [
                                'label' => 'Состояние заявки',
                                'icon' => 'fa fa-hourglass-half',
                                'url' => Url::to(['/client-state/index']),
                                'active' => $this->context->route == 'client-state/index',
                            ],
                        ],
                    ],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                ]
            ]
        )
        ?>
    </section>
    <!-- /.sidebar -->
</aside>