<?php
/**
 * authCtrl
 * 
 * @category   Controller
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>
 
 * @copyright  2017-03-18 maxkod.pl
 * @version    1.0
 */

namespace Ctrl;

use Lib\Ctrl;
use Lib\Checker\CheckerLogin;


class AuthCtrl extends Ctrl
{
    public function __construct()
    {
    	$this->addChecker(new CheckerLogin);
    }

}

    

