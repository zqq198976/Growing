<?php
/**
 * Created by PhpStorm.
 * User: zqq
 * Date: 2015-10-17
 * Time: 23:32
 */
//ThinkPHP入口文件
//记录开始运行的时间
$GLOBALS['_beginTime'] = microtime(TRUE);//microtime([ bool $get_as_float ])--返回当前UNIX时间戳和微秒数，如果$get_as_float为TRUE，将返回浮点数
//记录内存初始使用
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));//memory_get_usage([ bool $real_usage = false ])--返回分配给PHP的内存，如果[ bool $real_usage = false ]为TRUE，将获取系统分配的真实内存，如果未设置或者设置为FALSE，将获取emalloc()报告的内存
if(MEMORY_LIMIT_ON) $GLOBALS['_startUseMems'] = memory_get_usage();
defined('APP_PATH') or define('APP_PATH',dirname($_SERVER['SCRIPT_FILENAME']).'/');//dirname(string,$path)--返回路径中的目录部分
defined('RUNTIME_PATH') or define('RUNTIME_PATH',APP_PATH.'Runtime/');
defined('APP_DEBUG') or define('APP_DEBUG',false);//是否开启调试模式
$runtime = defined('MODE_NAME')?'~'.strtolower(MODE_NAME).'_runtime.php':'~runtime.php';
defined('RUNTIME_FILE') or define('RUNTIME_FILE',RUNTIME_PATH.$runtime);
if(!APP_DEBUG && is_file(RUNTIME_FILE)){
    //部署模式直接载入运行缓存
    require RUNTIME_FILE;
}else{
    //系统目录定义
    defined('THINK_PATH') or define('THINK_PATH',dirname(__FILE__).'/');
    //加载运行时文件
    require THINK_PATH.'Common/runtime.php';
}