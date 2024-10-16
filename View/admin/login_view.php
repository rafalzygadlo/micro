<?php

namespace app\view\admin;

use app\view\admin\admin_view;

class login_view extends admin_view
{

    private $login_error = false;

    public function __construct()
    {
        parent::__construct($template = 'admin/login/index');
    }

    public function get_title()
    {
        return __("Login");
    }
    
    public function set_login_error($value)
    {
        $this->login_error = $value;
    }
    
    public function get_login_error()
    {
        return $this->login_error;
    }
}

