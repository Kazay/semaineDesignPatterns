<?php

namespace Controller;

class HomeController extends FrontController {

    protected $viewName = 'home';
    protected $viewTitle = 'Home page';

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
       $tpl = $this->renderView();
       echo $tpl;die;
    }

}