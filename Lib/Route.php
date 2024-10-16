<?php

/**
 * Base
 * 
 * @category   Libs
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>
 
 * @copyright  2020 maxkod.pl
 * @version    1.0
 */

namespace Lib;

class Route
{
       
    private $url;
    
    /* which controller to load */
    private $ctrl;
     
    /* which function name method in class*/
    private $method;
    
    /* splitted uri */
    private $uri;
 
    public function __construct($url, $ctrl, $method)
    {
        $this->url = $url;
        $this->ctrl = $ctrl;
        $this->method = $method;        
    }
 
    public function getUrl()
    {
        return $this->url;
    }
    
    public function getCtrl()
    {
        return $this->ctrl;
    }
    
    public function getMethod()
    {
        return $this->method;
    }
      
    private function checkCtrl()
    {
        $filename = CTRL_FOLDER . '/'. $this->ctrl . '.php';

        if (file_exists($filename))
            return true;
        else
            return false;
	    
    }
    
    private function loadCtrl($request)
    {
        $this->ctrl = str_replace('/','\\',$this->ctrl);
        $classname = CTRL_FOLDER. '\\' .$this->ctrl;
       
        $ctrl = new $classname();
        
        /*run a controller method*/
        $ctrl->run($this, $request);
    
    }
    
    private function find($request)
    {
   
        if (strcmp($this->getUrl(), $request->getUrl()) == 0) 
            return true;
        else
            return false;
        
    }
    
    public function load($request)
    {
        if(!$this->find($request))
            return false;
        
        if(!$this->checkCtrl())
            return false;
        
        $this->loadCtrl($request);
        
        return true;
    }
  
}