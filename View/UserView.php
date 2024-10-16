<?php

namespace View;

use Lib\View;

class UserView extends View
{

    public function GetTitle()
    {
        return __("Users");
    }
    
    public function Render($template = 'index', $values = array(), $content = false)
    {
        parent::render('user/index', $values, $content);
    }
}

