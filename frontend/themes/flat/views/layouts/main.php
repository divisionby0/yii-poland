<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\themes\flat\assets\AppAsset;
use common\helpers\PermissionHelpers;

$bundle = AppAsset::register($this);
$directoryAsset = $bundle->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <?= $this->render('header.php', ['directoryAsset' => $directoryAsset])?>
    <?= $this->render(
        'content.php',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ) ?>
    <?= $this->render('footer.php', ['directoryAsset' => $directoryAsset])?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
