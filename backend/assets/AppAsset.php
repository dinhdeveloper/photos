<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/datepicker3.css',
        'css/styles.css',

    ];
    public $js = [
        'ckeditor/ckeditor.js',
        'js/lumino.glyphs.js',
        'js/jquery-1.11.1.min.js',
        'js/bootstrap.min.js',
        'js/chart.min.js',
        'js/chart-data.js',
        'js/easypiechart.js',
        'js/easypiechart-data.js',
        'js/bootstrap-datepicker.js',
        'js/datepic.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
