<?php

namespace yii\base\Model;

use yii\base\Model;

class AdminLogin extends Model 
{
    public $a_username;
    public $a_password;

    public function rules()
    {
        return
        [
            [['a_nama', 'a_password'], 'required'],
            ['a_password', 'a_password'],
        ];
    }   
}