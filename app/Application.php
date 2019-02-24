<?php
namespace MotivOnline;

use AltoRouter;

Class Application
{
    private $config;
    private $router;

    public function __construct()
    {
        // Get config and set router
        $config = parse_ini_file(__DIR__ . '/config.conf',true);
        $this->config = $config;
        $this->router = new AltoRouter();
        $this->router->setBasePath($config['BASE_PATH']);
        $this->defineRoutes();
    }

    public function defineRoutes()
    {
        // Define route
        $this->router->map('GET', '/', 'MainController#home', 'main_home');

        $this->router->map('POST', '/inscription', 'UserController#signup', 'user_signup');
        $this->router->map('GET', '/inscription', 'UserController#signup', 'user_signup_view');
        $this->router->map('POST', '/connexion', 'UserController#signin', 'user_signin');
        $this->router->map('GET', '/connexion', 'UserController#signin', 'user_signin_view');
        $this->router->map('GET', '/profil', 'UserController#profile', 'user_profile');
    }

    public function run()
    {
        // Get route info, instantiate controller and call method
        $match =  $this->router->match();
        if ($match !== false) {
            $controllerAndMethod = explode('#', $match['target']);
            $controllerName = $controllerAndMethod[0];
            $methodName = $controllerAndMethod[1];
            $controllerName = 'MotivOnline\Controller\\'. $controllerName;
            
            $controller = new $controllerName($this);
            $controller->$methodName($match['params']);
        } else {
            $controller = new \MotivOnline\Controller\MainController($this);
            $controller->error(404);
        }
    }

    // Getters and Setter
    public function getRouter()
    {
        return $this->router;
    }

    public function setRouter(AltoRouter $router)
    {
        $this->router = $router;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }
}