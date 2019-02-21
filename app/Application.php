<?php
namespace DevProjet;

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
    }

    public function run()
    {
        // Get route info, instantiate controller and call method
        $match =  $this->router->match();
        if ($match !== false) {
            $controllerAndMethod = explode('#', $match['target']);
            $controllerName = $controllerAndMethod[0];
            $methodName = $controllerAndMethod[1];
            $controllerName = 'DevProjet\Controller\\'. $controllerName;
            
            $controller = new $controllerName($this);
            $controller->$methodName($match['params']);
        } else {
            \DevProjet\Controller\CoreController::sendHttpError(404, 'Dev-Projet - erreur 404');
        }
    }

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