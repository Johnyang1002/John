<?php

namespace Core;
class John
{
  public static $ClassMap = [];
  public $assign;
  public static function run(){
    //路由
    $Route = new \Core\Lib\Route();
    //将首字符大写
    $Controller = ucfirst($Route->Controller);
    //初始化方法
    $Action = $Route->Action;
    //控制器文件
    $ControllerFile  = APP.'/Controller/'.$Controller.'Controller.php';
    //控制器
    $ControllerClass = '\\' . MODULE . '\Controller\\' . $Controller . 'Controller';
    //存在则引入不存在则抛出异常
    if (is_file($ControllerFile)) {
      include $ControllerFile;
      $C = new $ControllerClass();
      //默认调用index
      $C->$Action();
    } else {
      throw new \Exception("not find".$ControllerClass);
    }
  }
  static public function load($Class)
  {
    //
    if (isset($ClassMap[$Class])) {
      return true;
    } else {
      $Class = str_replace('\\', '/', $Class);
      $File = JOHN . '/'.$Class . '.php';

      if (is_file($File)) {
          include $File;
          self::$ClassMap[$Class] = $Class;
      } else {
          return false;
      }
    }
  }
  public function assign($name,$value)
  {
      // if(!$name || !$value){
      //   throw new \Exception('不存在'.$name);
      // }
      $this->assign[$name] = $value;


  }
  public function display($File)
  {

    $File = APP . '/View/' . $File . '.html';
    if (is_file($File)) {
      // extract();将数组中的key作为变量 value 作为值
      extract($this->assign);
      include $File;
    }
  }
}
