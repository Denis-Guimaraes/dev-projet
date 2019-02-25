<?php
namespace Test\MotivOnline\Controller;

use PHPUnit\Framework\TestCase;
use MotivOnline\Application;
use MotivOnline\Controller\UserController;
use MotivOnline\Model\UserModel;
use MotivOnline\Util\User;

/**
 * @runTestsInSeparateProcesses
 */
class UserControllerTest extends TestCase
{
    public function testSignupUser()
    {
        $application = new Application();
        $controller = new UserController($application);
        $_SERVER['REQUEST_URI'] = '';
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
        $this->assertIsArray($controller->getData());
        $this->assertFileExists(__DIR__ .'/../../app/View/user/signin.php');
    }

    public function testSigninUser()
    {
        $application = new Application();
        $controller = new UserController($application);
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
        ];

        $controller->signin();
        if (User::isConnected()) {
            $this->assertInstanceOf(UserModel::class, $_SESSION['connectedUser']);
            $this->assertContains(
                'Location: ' . $controller->getRouter()->generate('user_profile'),
                xdebug_get_headers()
            );
        } else {
            $this->assertIsString($controller->getTemplateName());
            $this->assertIsArray($controller->getData());
            $this->assertFileExists(__DIR__ .'/../../app/View/main/home.php');
        }
    }

    public function testProfileUser()
    {
        $application = new Application();
        $controller = new UserController($application);
        $_SERVER['REQUEST_URI'] = '';

        $controller->profile();
        if (User::isConnected()) {
            $this->assertInstanceOf(UserModel::class, $_SESSION['connectedUser']);
            $this->assertIsString($controller->getTemplateName());
            $this->assertIsArray($controller->getData());
            $this->assertFileExists(__DIR__ .'/../../app/View/user/profile.php');
        } else {
            $this->assertContains(
                'Location: ' . $controller->getRouter()->generate('main_home'),
                xdebug_get_headers()
            );
        }
    }
}