<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>

<?php
NavBar::begin([
    'brandLabel' => Html::img($directoryAsset . '/img/logo.png', [
        'alt' => 'User Image'
    ]),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top wet-asphalt',
    ],
]);
$menuItems = [
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>


<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1><?= Html::encode($this->title) ?></h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => [
                    'class' => 'breadcrumb pull-right',
                ],
                'homeLink' => [
                    'label' => 'На главную',
                    'url' => ['site/index'],
                ],
            ]) ?>
        </div>
    </div>
</section><!--/#title-->