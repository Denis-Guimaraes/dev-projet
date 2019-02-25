<?php
namespace Test\MotivOnline\Controller;

use PHPUnit\Framework\TestCase;
use MotivOnline\Application;
use MotivOnline\Controller\LetterController;
use MotivOnline\Model\LetterModel;
use MotivOnline\Util\User;
use MotivOnline\Controller\UserController;

/**
 * @runTestsInSeparateProcesses
 */
class LetterControllerTest extends TestCase
{
    public function testShowAllLetter()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->showAllLetter();
        $this->assertIsString($controller->getTemplateName());
        $this->assertIsArray($controller->getData());
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/letterList.php');
    }

    public function testCreateLetter()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'name' => 'test5 letter',
            'title' => 'test5 title',
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->createLetter();
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/newLetter.php');
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
    }
}