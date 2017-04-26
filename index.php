<<<<<<< 1b8ff1678c8d34d042117ec028b7f11b068fc464
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
=======
<?php
    //设置字符集
    header('content-type:text/html;charset=utf-8');
    if (version_compare(PHP_VERSION,'5.4.0','<'))
    die('php版本低于5.4.0');
    //定义常量
    define('JOHN',realpath('./'));
    define("CORE",JOHN.'/Core');
    define("APP",JOHN."/App");
    define("MODULE",'App');
    define("DEBUG",true);
    //调试
    if (DEBUG) {
      ini_set('display_error','On');
    } else {
      ini_set('display_error','Off');
    }
    //设置时区
    date_default_timezone_set("PRC");
    //引入函数库,虽然没有什么函数
    include CORE.'/Common/Function.php';
    //引入基类
    include CORE.'/John.php';
    // 自动加载类
    spl_autoload_register('\Core\John::load');
    //启动框架
    \Core\John::run();
>>>>>>> all
