<?php

namespace app\view\admin;

use app\core\view;

class admin_view extends view
{

    public function __construct($template = 'home/index', $values = array() , $content = false, $layout = "admin/_layout.html", $style = "../style/default")
    {
        parent::__construct($template, $values  , $content, $layout , $style );
    }
    

}
