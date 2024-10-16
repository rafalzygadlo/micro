<?php

/**
 * Bootstrap
 * 
 * @category   Libs
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>

 * @copyright  2016 maxkod.pl
 * @version    1.0
 */

namespace Lib;

use Lib\Router;

class App {

    public function run() {
        $router = new Router();
        $router->resolve(new Request);
    }

}
