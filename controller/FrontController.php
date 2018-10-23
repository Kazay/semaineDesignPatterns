<?php

namespace Controller;
use Mustache_Engine as Mustache;
use Mustache_Loader_FilesystemLoader;
use \Helper\View;
use \Model\Page;

class FrontController extends Controller {

    protected $mustache;
    protected $viewDirectory = './';

    function __construct() {
      parent::__construct();
    }

}
