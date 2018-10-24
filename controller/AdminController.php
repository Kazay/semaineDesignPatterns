<?php

namespace Controller;
use Mustache_Engine as Mustache;
use Mustache_Loader_FilesystemLoader;
use \Helper\View;
use \Model\User;

class AdminController extends Controller
{
  protected $mustache;
  protected $viewDirectory = './admin/';

  protected $viewName = 'admin';
  protected $viewTitle = 'Administration page';

  function __construct()
  {
    /*parent::__construct();*/
  }

  public function index()
  {
   /*$tpl = $this->renderView();
    echo $tpl;*/
    $user = new User();
    $user->setPseudo('Kazay');
    $user->setfirstName('Kevin');
    $user->setlastName('Czaja');
    $user->setEmail('czajakevin@gmail.com');
    $user->save();
  }
}
