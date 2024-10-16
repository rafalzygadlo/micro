<?php

/**
 * loginCtrl
 * 
 * @category   Controller
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>
 
 * @copyright  2016 maxkod.pl
 * @version    1.0
 */

namespace Ctrl;

use Lib\Ctrl;
use Lib\View;
use Lib\Checker\CheckerLogin;
use Repository\userRepository;

class loginCtrl extends Ctrl
{
    

    public function do()
    {
        print 'loggedin';
    }

    public function index()
    {	   
        $view = new View();
        $view->render('login/index');
          
    }
    
}

