<?php

namespace View;

use Lib\View;

class HomeView extends View
{
    
    public function __construct()
    {
        parent::__construct($template = 'home/index');
    }
}

