<?php
namespace app\models;
class Guest extends \yii\base\Model
{
public $username;
public $password;
public $male;
public $fam;

    public function rules()
{
    return [
    [['username','password','male','fam'] ,'required'],

    [['password'], 'string', 'max' => 4],

    ];
}




}