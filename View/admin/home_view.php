<?php

namespace app\view\admin;

use app\view\admin\admin_view;
use app\core\render;

class home_view extends admin_view
{
    
    public function __construct()
    {
        //przekazanie przez value
        $values = array
        (
            'render' => new render()
        );

        parent::__construct($template = 'admin/home/index', $values);
        
    }
}

