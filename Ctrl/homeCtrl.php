<?php

namespace Ctrl;


use Lib\Ctrl;
use Lib\View;

class homeCtrl extends Ctrl
{
 
    public function index()
    {
        $view = new View();
        $view->render('home/index');
    }

}
