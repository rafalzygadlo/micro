<?php

/**
 * userModel
 * 
 * @category   Model
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>

 * @copyright  2016 maxkod.pl
 * @version    1.0
 */

 namespace Repository;
 
 use PDO;
 use Lib\Repository;
 use Lib\Tool;
 
class userRepository extends Repository
{

    public function login($email, $password)
    {
        $params = array
        (
            ':email' => $email,
            ':password' => md5($password)
        );
        
        $sql = "SELECT * FROM user WHERE email=:email AND password=:password AND confirmed=1";
        $user = $this->db->row($sql, $params);
        
        if(!$user)
        {
            return false;
        }
        else
        {
            $this->generateApiToken ($user->id_user);
            return $this->get($user->id_user);
        }
    }
    
    public function generateApiToken($id_user)
    {
        $params = array
        (
            ':api_token' => Tool::RandomString(60),
            ':id_user' => $id_user
        );
        
        $sql = "UPDATE user SET api_token=:api_token WHERE id_user=:id_user";
        $this->db->nonQuery($sql, $params, PDO::FETCH_ASSOC);
        
    }
    
    public function get($id_user)
    {
        $params = array
        (
            ':id_user' => $id_user
        );
        
        $sql = "SELECT * FROM user WHERE id_user=:id_user";
        return $this->db->row($sql, $params, PDO::FETCH_ASSOC);
    }
    
    public function checkToken($api_token)
    {
        $params = array
        (
            ':api_token' => $api_token
        );
                   
        $sql = "SELECT * FROM user WHERE api_token=:api_token";
        return $this->db->_query($sql, $params, PDO::FETCH_ASSOC);
    }
    
    
  
}
