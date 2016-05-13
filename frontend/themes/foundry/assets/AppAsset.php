<?php

namespace frontend\themes\foundry\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/foundry';

    public $css = [
        'plugins/font-awesome/css/font-awesome.min.css',
        'plugins/themify-icons/themify-icons.css',
        'css/theme.css',
        'css/custom.css',
    ];

    public $js = [
        'js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}