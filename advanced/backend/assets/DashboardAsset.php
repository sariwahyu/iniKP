<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstap.min.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        // 'css/font-awesome.min.css',
        // 'css/ionicons.min.css',
        'css/jquery-jvectormap.css',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
        'css/site.css',
        'plugins/iCheck/flat/blue.css'
    ];
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        '//code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        //'js/fastclick.js',
        'plugins/fastclick/fastclick.min.js',
        'js/adminlte.min.js',
        'js/jquery.sparkline.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'js/jquery-jvectormap-1.2.2.min.js',
        'js/jquery-jvectormap-world-mill-en.js',
        //'js/jquery.slimscroll.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'js/Chart.js',
        'js/dashboard2.js',
        'js/demo.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
