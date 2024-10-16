<?php

namespace Lib\Input;

use Lib\Input;
use Lib\Tool;

class InputEmailUnique extends Input
{

    private function checkEmail()
    {
        if (!Tool::IsValidEmail($this->getValue()))
        {
            $this->AppendError($this->errorText, 'Email Not Valid');
            $this->setValid(false);
        }
    }
    
    private function checkUniqueEmail()
    {
       
        $params = array(':email' => $this->getValue());
        if($this->DB->Count("SELECT count(*) FROM user WHERE email=:email",$params))
        {
            $this->AppendError($this->errorText, 'Email Exists');
            $this->setValid(false);
        }
    }
    
    public function validate()
    {
        $this->checkRequired();
        $this->checkEmail();
        $this->checkUniqueEmail();
    }
    
}