<?php

namespace Lib;

use Lib\Msg;
use Lib\Exception\MyException;


abstract class Ctrl
{
   
    private $actions = array();
        
  
    public function run($route, $request)
    {
	    foreach($this->actions as $action)
	    {
            $action->run($request);
	    }

        $action = $route->getMethod();
	    if(method_exists($this, $action))
        {
            $this->$action($request);
        }
        
    }
    
    public function getCtrlName()
    {
	    return $this->ctrl;
    }
	

    public function addChecker($action)
    {
	    array_push($this->actions,$action);
    }
    
  
    
}
