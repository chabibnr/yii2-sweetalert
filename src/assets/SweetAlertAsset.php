<?php

namespace chabibnr\sweetalert\assets;

use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
    public $sourcePath = '@chabibnr/sweetalert/../dist';
    public $js = [
        'js/sweetalert.min.js',
    ];
    public $depends = [

    ];
}