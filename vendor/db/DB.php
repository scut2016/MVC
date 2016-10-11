<?php
/**
 * 文件名：DB.php
 * 编辑器：PhpStorm
 * 作者: lf
 * 日期: 2016/10/11 22:26
 */

namespace vendor\db;
interface DB
{
     function connect($configs=array());//数据库连接
     function close();//关闭数据库
    function all($type=MYSQLI_ASSOC);//获取结果二维数组,默认为关联数组
    function one();//获取单一结果一维数组
    function query($sql);//直接执行sql语句
    
}