<?php
/**
 * 文件名：MySQLi.php
 * 编辑器：PhpStorm
 * 作者: lf
 * 日期: 2016/10/11 22:31
 */

namespace vendor\db\Driver;

use vendor\db\DB;

class MySQLi  implements DB
{
    private static $instance=null;
    private $conn=null;
    private $sql=null;
    private function __construct($config)
    {
       $this->conn=$this->connect($config);
    }

    public static function getInstance($config=array())
    {
        if(!self::$instance)
            self::$instance = new self($config);
        return self::$instance;
    }
    
    function connect($configs=array())
    {
       $conn=new \mysqli($configs['hostname'],$configs['username'],$configs['password'],$configs['dbName']);
        if($conn->connect_error)
        {
            die($conn->connect_error) ;
        }
        return $conn;
    }

    function close()
    {
        $this->conn->close();
    }

    function all($type = MYSQLI_ASSOC)
    {
        $this->sql=$this->select();
        switch ($type)
        {
            case MYSQLI_NUM :
                return $this->getAssoc($this->sql);
                break;
            case MYSQLI_ASSOC :
                return $this->getRow($this->sql);
                break;
        }
    }
    function one()
    {
        // TODO: Implement one() method.
    }
    function query($sql)
    {
        $res=$this->conn->query($sql) or die ("执行 $sql 错误".$this->conn->error);
        return $res;
    }
    private function exeDql($sql)
    {
        $res=$this->conn->query($sql) or die ("执行 $sql 错误".$this->conn->error);
        return $res;
    }
    public function exeDml($sql)
    {
        $res=$this->conn->query($sql) or die ($this->conn->error);
        $num=$this->conn->affected_rows;
        return $num;
    }
    public function getAssoc($sql)
    {
        $arr=array();
        $res=$this->exeDql($sql);
        while($row=$res->fetch_assoc())
        {
            $arr[]=$row;
        }
        $res->free();
        return $arr;
    }
    public function getRow($sql)
    {
        $arr=array();
        $res=$this->exeDql($sql);
        while($row=$res->fetch_row())
        {
            $arr[]=$row;
        }
        $res->free();
        return $arr;
    }

    function select()
    {
        $sql="select * from student";
        return $sql;
    }
   
}