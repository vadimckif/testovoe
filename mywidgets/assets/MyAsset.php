<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\mywidgets\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MyAsset extends AssetBundle
{
    //public $basePath = '@webroot';
   // public $baseUrl = '@web';
   public $sourcePath='@app/mywidgets';
    public $css = [
       // 'css/site.css',
    ];
    public $js = [
'js/mywid.js'
    ];
    public $depends = [
       // 'yii\web\YiiAsset',
		'app\assets\AppAsset'
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
