<?php

namespace app\modules\vadim;
use yii\filters\AccessControl;
/**
 * universal module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
	 public $defaultRoute='main/index';
   // public $controllerNamespace = 'app\modules\vadim\controllers';
 public $class1;
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
	/*public function behaviors()
	{
		return [
            'access' => [
                'class' => AccessControl::className(),
              // 'only'=>['product/index'],
                'rules' => [
                    [
                        'allow' => true,
                     //  'actions'=>['product/index'],
                        'roles' => ['admin'],
                    ],
                    
                ],
            ],
        ];
	}*/
}
