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

class Request
{
    
    private $ctrl;
    private $method;
    private $url;
    private $param;
    
    public function __construct()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        $this->url = $request_uri;
        if(isset($request_uri))
        {
            @list($this->ctrl, $this->method, $this->param) = explode("/", $request_uri, 3);
        }
       
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
    
    function getAuthorizationHeader()
    {
        $headers = null;
        if (isset($_SERVER['Authorization'])) 
        {
            $headers = trim($_SERVER["Authorization"]);
        }
        
        return $headers;
    }
    
    /**
    * get access token from header
    * */
    function getBearerToken() 
    {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) 
        {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) 
            {
                return $matches[1];
            }
        }
   
        return null;
    
    }
    

}

