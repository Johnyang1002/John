<?php
namespace Core\Lib;
use Core\Lib\Config;
class Model extends \PDO
{
  public function __construct()
  {

    $data = Config::all('Database');
    try {

      parent::__construct($data['DSN'],$data['USER'],$data['PWD']);

    } catch (\PDOException $e) {

      p($e->getMessage());

    }

  }
}
