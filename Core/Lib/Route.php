<?php
namespace Core\Lib;
use Core\Lib\Config;
class Route
{
  public $Controller;
  public $Action;
  public function __construct()
  {

    $Uri = $_SERVER['REQUEST_URI'];
    if (isset($Uri) && $Uri != '/') {
      # code...
      $PathArr = explode('/',trim($Uri,'/'));
      // p($PathArr
      if (isset($PathArr[0])) {
        $this->Controller = $PathArr[0];
      }
      unset($PathArr[0]);
      if (isset($PathArr[1])) {
        $this->Action = $PathArr[1];
        unset($PathArr[1]);
      } else {
        $this->Action = Config::get('ACTION','Route');
      }
      $count = count($PathArr) + 1;
      $i = 2;
      while ($i < $count) {
        $_GET[$PathArr[$i]] = $PathArr[$i+1];
        $i += 2;
      }

    } else {

      $this->Controller = Config::get('CONTROLLER','Route');
      $this->Action = Config::get('ACTION','Route');
    }
  }
}
