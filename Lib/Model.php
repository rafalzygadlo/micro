<?php


namespace Lib;

use PDO;
use Lib\Exception\NotImplementedException;

abstract class Model
{

    public $db;
    
    private $limit = 30;
    
    private $limitFrom = 0;
    
    // rosnąco, malejąco
    private $asc = SORT_ASC;                 
    
    private $items;
    
    private $page = 1;

    private $countAll = 0;
    
    private $orderColumnId = 0;
    
    public $orderFieldName = 'id';                 
    
    public $breadcrumbItems;
    
    
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // GET
    
    public function getBreadcrumbItems()
    {
        return $this->breadcrumbItems;
    }
    
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
    
    public function getOrderFieldName()
    {
        
        $columns = $this->getColumns();
        if (count($columns) > $this->orderColumnId)
        {
            $column = $columns[$this->orderColumnId];
            $this->orderFieldName = $column->getFieldName();
        }
        else
        {

            new myException('Columns Error: '.$this->CtrlName,count($this->Columns).' - '.$this->OrderColumnId);
        }
       
        return $this->orderFieldName;
        
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
    
    public function getImage()
    {
        return DEFAULT_IMAGE;
    }

    public function getActive()
    {
        return STATUS_ACTIVE;
    }

    public function getLang()
    {
        return Session::getLang();
    }
    
    public function getCount()
    {
        return 0;
    }
    
    public function getCountAll()
    {
        return $this->countAll;
    }
    
    // parent item from database
    public function getCurrentItem()
    {
        //new myException('NOT IMPLEMENTED', __FUNCTION__);
    }
    
    public function getIdParent()
    {
        return 0;//new myException('NOT IMPLEMENTED', __FUNCTION__);
    }
    
     //set
    public function setPage($value)
    {
        $this->page = $value;
        $this->checkPage();
        $this->setLimitFrom(($this->page - 1) * $this->limit);
    }
    
    public function setAsc($value)
    {
        $this->asc = $value;
    }
    
    public function setOrderColumnId($value)
    {
        $this->orderColumnId = $value;
    }
    
   
    public function setLimitFrom($value)
    {
        $this->limitFrom = $value;
    }
    
    public function setLimit($limit)
    {
        $this->limit = $limit;
        $this->setLimitFrom(($this->page - 1) * $this->limit);
        Session::setLimit($limit);
    }
   
    public function insert()
    {
        new NotImplementedException(__FUNCTION__);
    }

    public function update()
    {
        new NotImplementedException(__FUNCTION__);
    }
    
    public function truncate()
    {
        $this->db->_query('TRUNCATE TABLE '.$this->getTable(),NULL);
    }

    public function countAll()
    {
        return 0;
    }
    
        
    private function checkPage()
    {
        if ($this->getLimit() == 0)
        {
            $this->setPages(1);
        }
        else
        {
            $this->pages = ceil(($this->getCount() / $this->getLimit()));
        }

        if ($this->pages <= $this->page - 1)
        {
            Session::setPage(1);
            $this->page = 1;
        }

        //strona <= 0
        if ($this->page < 1)
        {
            Session::setPage(1);
            $this->page = 1;
        }
    }
    
     
    public function all()
    {
        return array();
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }

    public function count()
    {
        return 0;
    }

    
    //public function setIdParent()
    //{
        
    //}
    
    
    public function rowCount()
    {
        return $this->db->rowCount();
    }

    /*
    public function checkConfirm($email, $password)
    {
        $params = array
        (
            ':email' => $email,
            ':password' => $password,
            ':active' => STATUS_ACTIVE
        );
        
        if ($this->DB->count('SELECT * FROM user WHERE md5(email)=:email AND password=:password AND active=:active', $params, PDO::FETCH_CLASS) == 1)
            return true;
        else
            return false;
    }

    public function checkBusiness($domain)
    {
        $params = array(':domain' => $domain );
        $row = $this->DB->Row('SELECT * FROM business WHERE domain=:domain', $params, PDO::FETCH_CLASS);
        if ($row)
        {
            return $row;
        }
        else
        {
            return NULL;
        }
    }
    
    */
    
    public function insertVisit()
    {
        $params = array(':remote_addr' => $_SERVER['REMOTE_ADDR']);
        $this->db->_Query('INSERT INTO visit SET remote_addr=:remote_addr,date=now()', $params);
    }

    public function uniqueVisits()
    {

        //$sql = 'SELECT * FROM visit GROUP BY ip';
        //$result = mysql_query($sql);
        //return  mysql_num_rows($result);
    }

    public function lists()
    {
        //new NotImplementedException(__FUNCTION__);
    }

}

