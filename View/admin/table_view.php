<?php


namespace app\view\admin;

use app\view\admin\admin_view;
use app\core\render\table;
use app\core\render\column\column_text;

class table_view extends admin_view
{
    public function __construct($template, $id, $parent_id, $ctrl_name, $columns, $items, $order = null)
    {
        parent::__construct($template);
        $this->table = new table($id, $parent_id, $ctrl_name, $columns, $items);
    }

    public function get_title()
    {
        return __("Table");
    }
    
   
}

