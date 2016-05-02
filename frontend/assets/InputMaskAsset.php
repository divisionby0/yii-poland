<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class InputMaskAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        'js/jquery-inputmask/inputmask.js',
        'js/jquery-inputmask/jquery.inputmask.js',
        'js/jquery-inputmask/inputmask-init.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}