<?php

namespace Lib;

use Lib\Database;

class Input
{

    public $valid = true;         
    public $error = false;          
    protected $errorText = array();  
    private $errorStyle;             
    public $value;                  
    public $inValidator = false;    
    public $requiredText;           
    public $match;                  
    public $minLength;              
    public $maxLength;              
    public $startDate;              
    public $endDate;                
    public $uniqueEmail = false;    
    public $checked = false;        
    public $fieldLabel;
    public $fieldName;
    
    public $Type = FIELD_TYPE_INPUT;

    private $required = false;    // czy pole wymagane
    
    public function __construct()
    {
       $this->DB = Database::getInstance();
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function getErrorText()
    {
        return $this->errorText;
    }
    
    public function getValid()
    {
        return $this->valid;
    }
    
    public function getFieldName()
    {
        return $this->fieldName;
    }
    
    
    //SET
    public function setValid($value)
    {
        $this->valid = $value;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function setType($type)
    {
        $this->type = $type;
    }

    
    public function setFieldName($field_name)
    {
        $this->fieldName = $field_name;
    }
    
    public function setFieldLabel($field_label)
    {
        $this->fieldLabel = $field_label;
    }
    
    public function setRequired($value)
    {
        $this->required = $value;
        if($value)
            $this->requiredText = '(*)';
    }
     
    public function setMatch($field)
    {
        $this->match = $field;
    }
     
    public function setMinLength($value)
    {
        $this->minLength = $value;
    }
    
    public function setMaxLength($value)
    {
        $this->maxLength = $value;
    }
    
    public function setUniqueEmail()
    {
        $this->uniqueEmail = true; 
    }
   
    public function checkRequired()
    {
        
        if ($this->required)
        {
            if (empty($this->value))
            {
                $this->AppendError($this->errorText,'Field Is Required');
                $this->errorStyle = 'has-error';
                $this->valid = false;
            }
        }
    }
    
  
    public function checkMinLength()
    {
        if(isset($this->minLength))
        {
            $len = strlen($this->value);
            if($len < $this->minLength)
            {
                $this->appendError($this->errorText, 'Minimum Length'.'('.$this->minLength.')('.$len.')');
                $this->errorStyle = 'has-error';
                $this->isValid = false;
            }
        }
    }
    
    private function checkMaxLength()
    {
        if(isset($this->MaxLength))
        {
            $len = strlen($this->Value);
            if($len > $this->MaxLength)
            {
                $this->AppendError($this->ErrorText, 'Max Length'.' ('.$this->MaxLength.')('.$len.')');
                $this->ErrorStyle = 'has-error';
                $this->IsValid = false;
            }
        }
    }
    
    private function checkMatch()
    {
        if(isset($this->match))
        {
            if(strcmp($this->value,$this->match->value) !== 0 )
            {
                $this->appendError($this->errorText, 'Field Not Match');
                $this->isValid = false;
            }
        }
    }

    public function appendError(&$field,$text)
    {
        array_push($field,$text);
    }
   
    public function validate()
    {
        
    }
    
}
