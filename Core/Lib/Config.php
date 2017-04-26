<?php
namespace Core\Lib;
class Config
{
  static public $con = [];
  static public function get($name, $file)
  {
    if (isset(self::$con[$file])) {

      return self::$con[$file][$name];

    } else {

      $path = JOHN . '/Core/Config/' . $file . '.php';

      if (is_file($path)) {
          $con = include $path;

          if(isset($con[$name])) {
            self::$con[$file] = $con;
            return $con[$name];
          } else {
            throw new \Exception('没有此配置项',$name);
          }
      } else {
        throw new \Exeption('找不到配置文件' . $file);
      }
    }
  }
  static public function all($file)
  {
    $file = ucfirst($file);
    if (isset(self::$con[$file])) {

      return self::$con[$file];

    } else {

      $path = JOHN . '/Core/Config/' . $file . '.php';

      if (is_file($path)) {
          $con = include $path;
          self::$con[$file] = $con;
          return $con;
      } else {
        throw new \Exeption('找不到配置文件' . $file);
      }
    }
  }
}
