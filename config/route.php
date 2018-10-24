<?php

return [
    '' => [
        'controller' => 'HomeController', // Controller name
        'method' => 'index', // Method name (empty value will point to index() method)
        'middleware' => [], // Middlewares array
    ],
    'admin' => [
        'controller' => 'AdminController',
        'method' => 'index',
        'middleware' => ['Authentification'],
    ],
    // Define new routes here
];