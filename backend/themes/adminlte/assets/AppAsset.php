<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\themes\adminlte\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/adminlte';
    public $css = [
        'plugins/font-awesome/css/font-awesome.min.css',
        'plugins/ionicons/css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
        'css/site12.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
