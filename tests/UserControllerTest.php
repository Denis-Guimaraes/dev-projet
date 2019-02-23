<?php
namespace Test\MotivOnline\Controller;

use PHPUnit\Framework\TestCase;
use MotivOnline\Application;
use MotivOnline\Controller\UserController;

class UserControllerTest extends TestCase
{
    public function testSignupUser()
    {
        $application = new Application();
        $controller = new UserController($application);
        $_POST = [
            'firstname' => 'test2',
            'lastname' => 'test2',
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'confirmPassword' => 'testtest',
            'picture' => 'test2',
            'phoneNumber' => 'test2',
            'zipCode' => 'test2',
            'city' => 'test2',
            'adress' => 'test2',
        ];

        $controller->signup();
        $this->assertIsString($controller->getTemplateName());
        $this->assertIsArray($controller->getData());
        $this->assertFileExists(__DIR__ .'/../app/View/main/home.php');
    }
}