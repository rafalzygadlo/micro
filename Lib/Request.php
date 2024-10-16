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
    
    private $url;
    
    private $contentType;
    
    public function __construct()
    {
        
        if(isset($_SERVER['REQUEST_URI']) & 
            isset($_SERVER['CONTENT_TYPE']))
        {
            $this->url = $_SERVER['REQUEST_URI'];
            $this->contentType = $_SERVER['CONTENT_TYPE'];
        }
        else
        {

        }
    }
    
    public function getContentType()
    {
        return $this->contentType;
    }

    public function getUrl()
    {
        return $this->url;
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

