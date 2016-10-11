<?php
/**
 * 文件名：Model.php
 * 编辑器：PhpStorm
 * 作者: lf
 * 日期: 2016/10/11 22:20
 */

namespace vendor\base;
use vendor\core\Factory;

class Model
{
    private $db=null;
    function __construct()
    {
        $this->db=Factory::getDb();
    }

    

}