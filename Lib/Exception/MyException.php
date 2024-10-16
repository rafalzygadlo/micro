<?php

namespace Lib\Exception;

use Config\StyleConfig;
use Exception;

class MyException extends Exception
{

    public function __construct($title, $text = '')
    {

	print '<h3>'.$title.'</h3>';
	print $text;

    }

 
}