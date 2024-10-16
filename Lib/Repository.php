<?php


namespace Lib;

use PDO;
use Lib\Exception\NotImplementedException;

abstract class Repository
{

    public $db;
    
    private $limit = 30;
    
    private $limitFrom = 0;
    
    private $items;
    
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // GET
    
    public function getTable()
    {
        return NULL;
    }
    
    public function getAsc()
    {
        return $this->asc;
    }
    
    public function getOrderColumnId()
    {
        return $this->orderColumnId;
    }    
    
    public function getAscString()
    {
        if ($this->asc == SORT_ASC)
            return 'ASC';
        else
            return 'DESC';

    }
    
    public function getPages()
    {
        return ceil($this->getCount() / $this->getLimit());    
    }
    
    public function getPage()
    {
        return $this->page;
    }
    
    public function getLimit()
    {
        return $this->limit;
    }
    
    public function getLimitFrom()
    {
        return $this->limitFrom;
    }
    
    public function getTitle()
    {
        new NotImplementedException(__FUNCTION__);
    }
    
    public function getCountAll()
    {
        return $this->countAll;
    }
    
    public function truncate()
    {
        $this->db->_query('TRUNCATE TABLE '.$this->getTable(),NULL);
    }
     
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
  
    public function rowCount()
    {
        return $this->db->rowCount();
    }

}

