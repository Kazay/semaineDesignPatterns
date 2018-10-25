<?php

namespace Controller;
use Mustache_Engine as Mustache;
use Mustache_Loader_FilesystemLoader;
use \Helper\View;
use \Model\User;
use \Model\UserQuery;

class AdminController extends Controller
{
  protected $mustache;
  protected $viewDirectory = './admin/';

  protected $viewTitle = 'Administration page';

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $usersFromTable = UserQuery::create()->find();
    foreach($usersFromTable as $userFromTable)
    {
      $user[] = ['firstname' => $userFromTable->getfirstName(),
                      'lastname' => $userFromTable->getlastName(),
                      'username' => $userFromTable->getPseudo(),
                      'email' => $userFromTable->getEmail()];
    }

    $tpl = $this->renderView(__FUNCTION__, $user);
    echo $tpl;
       
  }

  public function add()
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $user->setPseudo($_POST['username']);
      $user->setfirstName($_POST['username']);
      $user->setlastName($_POST['username']);
      $user->setEmail($_POST['username']);
      $user->save();
    }

    $tpl = $this->renderView(__FUNCTION__);
    echo $tpl;
  }
}
