<?php
namespace Test\MotivOnline\Controller;

use PHPUnit\Framework\TestCase;
use MotivOnline\Application;
use MotivOnline\Controller\CompanyController;
use MotivOnline\Controller\UserController;

/**
 * @runTestsInSeparateProcesses
 */
class CompanyControllerTest extends TestCase
{
    public function testShowCompany()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
        ];
        $params = [
            'id' => 1,
            'companyId' => 1,
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new CompanyController($application);

        $controller->showCompany($params);
        $this->assertIsString($controller->getTemplateName());
        $this->assertIsArray($controller->getData());
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewCompany.php');
    }

    public function testUpdateCompany()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'name' => 'test15',
            'recipientName' => 'test15',
            'address' => 'test15',
            'city' => 'test15',
            'zipCode' => 'test15',
        ];
        $params = [
            'id' => 1,
            'companyId' => 1,
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new CompanyController($application);

        $controller->updateCompany($params);
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewCompany.php');
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
    }
}
