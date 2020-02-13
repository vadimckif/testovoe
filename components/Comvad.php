<?php
namespace app\components;
use yii\base\Component;

class Comvad extends Component
{
    public $prop1;
    public $prop2;
    const MYCONST='myconst';

   public function __construct($param1=[])
    {
        $this->prop1=$param1;
       // $this->prop1=$config;
        // ... инициализация происходит перед тем, как будет применена конфигурация.

       // parent::__construct($param1);
    }

    public function init()
    {
      //  $this->prop1='config';
        parent::init();

        // ... инициализация происходит после того, как была применена конфигурация.
    }
    public function out()
    {
        $this->trigger(self::MYCONST);
        return $this->prop1;
    }
}