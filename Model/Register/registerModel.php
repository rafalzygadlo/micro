<?php

/**
 * registerModel
 * 
 * @category   Model
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>

 * @copyright  2016 maxkod.pl
 * @version    1.0
 */

namespace Model\Register;

use Lib\Model;
use Lib\Input;
use Lib\Input\InputEmailUnique;
use Lib\Input\InputPassword;


class registerModel extends Model
{
    
    private $email;
    
    private $passsword;
    
    
    public function __construct()
    {
        parent::__construct();
        $this->initFormFields();
        $this->initRequired();
    }
    
    public function initFormFields()
    {
        $this->email = new InputEmailUnique();
        $this->password = new InputPassword();
    }
    
    
    public function initRequired()
    {
        $this->email->setRequired(true);
        $this->email->setUniqueEmail();
        $this->email->setType(FIELD_TYPE_EMAIL);
        $this->email->setFieldName('email');
        
        $this->password->setRequired(true);
        $this->password->setMinLength(8);
        $this->password->setFieldName('password');
    
    }
    
    //GET
    public function getId()
    {
        return $this->domain;
    }
   
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
   

}
