<?php

namespace frontend\themes\flat\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/flat';

    public $css = [
        'plugins/font-awesome/css/font-awesome.min.css',
        'plugins/prettyPhoto/prettyPhoto.css',
        'css/animate.css',
        'css/main.css',
    ];
    public $js = [
        'plugins/prettyPhoto/jquery.prettyPhoto.js',
        'js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}