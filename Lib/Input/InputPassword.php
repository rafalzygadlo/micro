<?php

namespace Lib\Input;

use Lib\Input;

class InputPassword extends Input
{
    
    public function Validate()
    {
       
        $this->CheckRequired();
        
    }
}