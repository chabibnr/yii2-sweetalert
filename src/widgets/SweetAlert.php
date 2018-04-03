<?php

namespace chabibnr\sweetalert\widgets;

use chabibnr\sweetalert\assets\SweetAlertAsset;
use Yii;
use yii\base\Widget;
use yii\web\JsExpression;

class SweetAlert extends Widget {
    const ALERT_KEY = 'open-sweetAlert';
    const ICON_SUCCESS = 'success';
    const ICON_ERROR = 'error';
    const ICON_WARNING = 'warning';
    const ICON_INFO = 'info';

    public function run(){
        $flashDataAlert = Yii::$app->getSession()->getFlash(static::ALERT_KEY);
        if(count($flashDataAlert) > 0){
            $body = $flashDataAlert['body'];
            $type = $flashDataAlert['type'];
            $view = Yii::$app->getView();
            SweetAlertAsset::register($view);
            $view->registerJs(new JsExpression("swal({title: '',text: \"{$body}\",icon: \"$type\",});"));
        }
    }

    public static function set($message, $icon = 'info'){
        Yii::$app->getSession()->setFlash(static::ALERT_KEY, ['type' => $icon, 'body' => $message]);
    }
}