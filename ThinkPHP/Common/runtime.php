<?php
/**
 * Created by PhpStorm.
 * User: zqq
 * Date: 2015-10-22
 * Time: 21:55
 * ThinkPHP运行时文件，编译后不再加载
 */
defined('THINK_PATH') or exit();
if(version_compare(PHP_VERSION,'5.2.0','<')) die('require PHP > 5.2.0');
//ThinkPHP版本信息
define('THINK_VERSION','3.1.2');
//系统信息
if(version_compare(PHP_VERSION,'5.4.0','<')){
    ini_set('magic_quotes_runtime',0);//magic_quotes_runtime--当它打开时，php大部分函数自动的给外部传入(包括数据库或者文件)的数据溢出的字符加上反斜线"\"
    define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()?TRUE:FALSE);//get_magic_quotes_gpc()--设置是否自动为GPC(get,post,cookie)传来的数据中的单引号'',双引号"",反斜线\和nul字符加上反斜线"\"
}else{
    define('MAGIC_QUOTES_GPC',FALSE);
}
define('IS_CGI',substr(PHP_SAPI,0,3)=='cgi' ? 1 : 0);//substr(string $string , int $start [, int $length ])--返回字符串的子串，$start--返回的起始位置，从0开始，$length--返回子字符串的长度
define('IS_WIN',strstr(PHP_OS,'WIN') ? 1 : 0);//strstr(string $haystack , mixed $needle [, bool $before_needle = false ])--查找字符串的首次出现，$before_needle为true时，将返回needle在haystack中的位置之前的部分
define('IS_CLI',PHP_SAPI=='cli' ? 1 : 0);