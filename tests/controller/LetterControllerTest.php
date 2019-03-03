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

    public function testShowLetter()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
        ];
        $params = [
            'id' => 19,
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->showLetter($params);
        $this->assertIsString($controller->getTemplateName());
        $this->assertIsArray($controller->getData());
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
    }

    public function testUpdateHeader()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'date' => date("Y-m-d H:i:s"),
            'title' => 'test11 title',
            'object' => 'test11 object',
        ];
        $params = [
            'id' => 19,
            'section' => 'entete',
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->updateLetter($params);
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/entete.php');
    }

    public function testUpdateSection1()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'title' => 'test11 title',
            'content' => 'test11 content',
        ];
        $params = [
            'id' => 19,
            'section' => 'section1',
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->updateLetter($params);
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/section1.php');
    }

    public function testUpdateSection2()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'title' => 'test11 title',
            'content' => 'test11 content',
        ];
        $params = [
            'id' => 19,
            'section' => 'section2',
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->updateLetter($params);
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/section2.php');
    }

    public function testUpdateSection3()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'title' => 'test11 title',
            'content' => 'test11 content',
            'conclusion' => 'test11 conclusion',
        ];
        $params = [
            'id' => 19,
            'section' => 'section3',
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->updateLetter($params);
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/section3.php');
    }

    public function testUpdateStyle()
    {
        $_SERVER['REQUEST_URI'] = '';
        $_POST = [
            'email' => 'test2@test.test',
            'password' => 'testtest',
            'styleId' => 1,
            'animationId' => 1,
            'name' => 'test11 name',
        ];
        $params = [
            'id' => 19,
            'section' => 'style',
        ];
        $application = new Application();
        $userController = new UserController($application);
        $userController->signin();
        $controller = new LetterController($application);

        $controller->updateLetter($params);
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/viewLetter.php');
        $this->assertFileExists(__DIR__ .'/../../app/View/letter/style.php');
    }
}
