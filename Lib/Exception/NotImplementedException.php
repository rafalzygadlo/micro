<?php

namespace Lib\Exception;

use Config\StyleConfig;
use Exception;

class NotImplementedException extends MyException
{

    public function __construct($function)
    {
        parent::__construct('NOT IMPLEMENTED',$function);
    }

}