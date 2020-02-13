<?php

namespace app\modules\vadim\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class Default1Controller extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return 'yra';
    }
}
