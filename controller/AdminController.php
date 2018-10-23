<?php

namespace Controller;
use Mustache_Engine as Mustache;
use Mustache_Loader_FilesystemLoader;
use \Helper\View;
use \Model\Section as Section;

class AdminController extends Controller
{
  protected $mustache;
  protected $viewDirectory = './admin/';

  protected $viewName = 'admin';
  protected $viewTitle = 'Administration page';

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $section = new Section();

    if(isset($_POST) && count($_POST) > 0)
    {   
        $rowToUpdate = [];
        //Check if order in $_POST is already define on another section. If so, swap.
        $arraySections = $this->getSections();
        foreach($arraySections as $sections)
        {
          if($sections['id'] != $_POST['id'] && $sections['order'] == $_POST['order'])
          {
            $initialSection = $section->getOneById($_POST['id']);
            $rowToUpdate = [
              'id' => $sections['id'],
              'order' => $initialSection['order']
            ];
            $section->update($rowToUpdate); 
          }
        }
        $section->update($_POST);
    }
    $tpl = $this->renderView($this->getSections());
    echo $tpl;die;
  }
}
