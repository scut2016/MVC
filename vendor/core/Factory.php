<?php
/**
 * 文件名：Factory.php
 * 编辑器：PhpStorm
 * 作者: lf
 * 日期: 2016/10/11 22:55
 */

namespace vendor\core;
use vendor\db\Driver\MySQLi;
class Factory
{
    static function getDb()
    {
        $config=[
            'hostname'=>'127.0.0.1',
            'username'=>'root',
            'password'=>'root',
            'dbName'=>'train',
            'charset'=>'utf-8',
        ];
       $db=MySQLi::getInstance($config);
        return $db;
    }
}