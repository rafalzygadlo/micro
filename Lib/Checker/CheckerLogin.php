<?php

namespace Lib\Checker;

use Lib\Checker;

class CheckerLogin extends Checker
{
  
    public function run($request)
    {
        $user = new \Repository\userRepository();
        
        if(!$user->checkToken($request->getBearerToken()))
        {
            // write Response class with Header error codes
            print json_encode(array("message"=>"unauthorized"));
            exit;
        }   		
    }

}
