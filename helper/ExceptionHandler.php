<?php

namespace Helper;

class ExceptionHandler
{
    static function error404()
    {
      echo '<h1>404 - Page not found</h1>';
      echo 'Demander à Cléo pour le style';
    }
}