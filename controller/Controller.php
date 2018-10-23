<?php

namespace Controller;
use Mustache_Engine as Mustache;
use Mustache_Loader_FilesystemLoader;
use \Helper\View;

class Controller {

    function __construct()
    {
        $this->mustache = new Mustache([
            'loader' => new Mustache_Loader_FilesystemLoader('./view/'),
            'partials_loader' => new Mustache_Loader_FilesystemLoader('./view/partial')
        ]);
    }

    protected function renderView($data)
    {
        $tpl = $this->mustache->loadTemplate($this->viewDirectory.$this->viewName);
        $tpl = $tpl->render([
            'title' => $this->viewTitle,
            'data' => $data]);

        return $tpl;
    }
}