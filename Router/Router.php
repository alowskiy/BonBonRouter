<?php

namespace Router;


use Examples\Route1;
use Examples\Main;

class Router
{
    public $route;
    public function __construct($route)
    {
        $this->route = $route;
    }

    public function checkRoute($route)
    {
        $routes = [ //defining routes
            '/route1' => [                   //URI
                'class' => Route1::class,    //clasName
                'method' => 'getData1',      //methodName
            ],
            '/' => [     
                'class' => Main::class, 
                'method' => 'welcome', 
            ],
        ];

        $key = array_key_exists($route, $routes);

        if ($key === false) {   // if route  not defined
            echo 'NotFound!!';
            http_response_code(404);
        } else {
            $class = $routes[$route]['class'];
            $method = $routes[$route]['method'];
            $inst = new $class();
            $inst->$method();
        }
    }
}
