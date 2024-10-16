<?php


namespace Lib;


class Validator
{

    private $fields;

    public function __construct()
    {
        $this->fields = array();
    }
    
    public function add(Input $field)
    {
        $field->inValidator = true;
        array_push($this->fields,$field);
    }
    
    public function JSON()
    {
       
        $array = array();
        $valid = true;
        
        foreach ($this->fields as $field)
        {
            if(!$field->getValid())
                $valid = false;
            
            $json_field = array
            (
                'valid' => $field->getValid(),
                'text'  => $field->getErrorText(),
            );
            
             $array[$field->getFieldName()] = $json_field;
        }
               
        $array['valid'] = $valid; 
        print json_encode($array);
    
    }
    
    
    public function run()
    {
        // check all fields
        foreach ($this->fields as $field)
        {
            $field->validate();
        }
        
        //and after that return a value
        foreach ($this->fields as $field)
        {
            if($field->getValid() == false)
                return false;
        }
        
        return true;
    }
    
}
