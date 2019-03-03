<?php
namespace MotivOnline\Controller;

use League\Plates\Engine as Plates;
use MotivOnline\Application;
use MotivOnline\Util\User;

abstract class CoreController
{
    protected $templateEngine;
    protected $router;

    public function __construct(Application $application)
    {
        // Set template engine
        $this->router = $application->getRouter();
        $config = $application->getConfig();
        $this->templateEngine = new Plates(__DIR__ .'/../View');
        $this->templateEngine->addData(
            [
                'router' => $this->router,
                'basePath' => $config['BASE_PATH'],
                'connectedUser' => User::getConnectedUser(),
                'isConnected' => User::isConnected(),
            ]
        );
    }

    public function sendHttpError(int $errorCode, string $htmlContent = '')
    {
        if ($errorCode == 404) {
            header("HTTP/1.0 404 Not Found");
            echo $htmlContent;
        }
    }

    public function sendJson(array $data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function show(string $templateName, array $dataToView = [])
    {
        echo $this->templateEngine->render($templateName, $dataToView);
    }

    public function redirect(string $routeName, array $params = [])
    {
        header('Location: '. $this->getRouter()->generate($routeName, $params));
    }

    public function getRouter()
    {
        return $this->router;
    }
}
