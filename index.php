<?php
header('content-type:text/html;charset=utf-8');
define('JOHN',realpath('./'));
define("CORE",JOHN.'/Core');
define("APP",JOHN."/App");
define("MODULE",'App');
define("DEBUG",true);

if (DEBUG) {
  ini_set('display_error','On');
} else {
  ini_set('display_error','Off');
}
date_default_timezone_set("PRC");
include CORE.'/Common/Function.php';

include CORE.'/John.php';
// 自动加载类
spl_autoload_register('\Core\John::load');
//启动框架
\Core\John::run();
