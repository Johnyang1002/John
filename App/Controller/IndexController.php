<?php
namespace App\Controller;

class IndexController extends \Core\John
{
  public function index()
  {
    $p = new \Core\Lib\Model();
    $data = [1,[1,2]];
    $this->assign('title','标题');
    $this->assign('data',$data);
    $this->display('Index');


  }

}
