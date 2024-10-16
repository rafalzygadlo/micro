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

namespace Repository;

use Lib\Repository;


class registerRepository extends Repository
{
    
    private $model;
    
    public function __construct()
    {
        parent::__construct();

    } 
    
    public function confirmEmail($key)
    {
        $params = array
        (   
            ':register_random' => $key
        );
        
        $this->db->NonQuery('UPDATE user SET confirmed=1, active=1 WHERE register_random=:register_random',$params);
    }
    
    //SET    
    public function registerUser(\Model\Register\registerModel $model, $key)
    {
        $params = array
        (   
            ':email'    => $model->getEmail()->getValue(),
            ':password' => md5($model->getPassword()->getValue()),
            ':register_random' => $key
        );
              
        $this->db->NonQuery('INSERT INTO user SET email=:email,password=:password,register_random=:register_random', $params);
          
        
        return true;
    }

}
