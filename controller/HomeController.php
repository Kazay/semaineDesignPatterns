<?php

namespace Controller;
use \Model\Section as Section;

class HomeController extends FrontController {

    protected $viewName = 'home';
    protected $viewTitle = 'Home page';

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
       $tpl = $this->renderView($this->getSections());
       echo $tpl;die;
    }

}