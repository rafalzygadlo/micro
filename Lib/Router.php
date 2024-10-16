<?php

/**
 * Router
 * 
 * @category   Libs
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>
 
 * @copyright  2020 maxkod.pl
 * @version    1.0
 */

namespace Lib;
 

class Router
{
    private $routes = array();
    
    public function addRoute($route)
    {
        array_push($this->routes, $route);
    }

    public function resolve($request)
    {
        $this->addRoute(new Route('/','homeCtrl','index'));
        $this->addRoute(new Route('/home','homeCtrl','index'));
        $this->addRoute(new Route('/login','loginCtrl','index'));
        $this->addRoute(new Route('/login/do','loginCtrl','do'));
        $this->addRoute(new Route('/register','registerCtrl','index'));
        $this->addRoute(new Route('/register/confirm','registerCtrl','confirm'));
        $this->addRoute(new Route('/user','userCtrl','index'));
        
        //admin
        $this->addRoute(new Route('/admin/home','Admin/homeCtrl','index'));

             
        foreach($this->routes as $route)
        {
            if($route->load($request))
                return;
        }

        $msg = array
        (
            "message" => "not found"
        );
        
        print json_encode($msg);
                
    }
    
}

