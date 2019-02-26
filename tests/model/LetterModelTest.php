<?php
namespace Test\MotivOnline\Model;

use PHPUnit\Framework\TestCase;
use MotivOnline\Model\LetterModel;

class LetterModelTest extends TestCase
{
    public function testFindAllLetter()
    {
        $letterModel = new LetterModel();
        $allLetter = $letterModel->findAllLetter(36);
        $this->assertIsArray($allLetter);
    }

    public function testFindLetter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUser_id(36));
        $result = $letterModel->findLetter(19);
        $this->assertInstanceOf(LetterModel::class, $result);
        dump($result);
    }

    public function testCreateLetter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setName('test2 letter'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setLink(uniqid()));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitle('test2 letter'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUser_id(36));
        $result = $letterModel->insert();
        $this->assertInstanceOf(LetterModel::class, $result);
    }

    public function testUpdateHeader()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitle('test10 title'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setDate(date("Y-m-d H:i:s")));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setObject('test10 object'));
        $result = $letterModel->updateHeader(19);
        $this->assertTrue($result);
    }

    public function testUpdatesection1()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitle_section_1('test10 title section 1'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setContent_section_1('test10 content section 1'));
        $result = $letterModel->updateSection1(19);
        $this->assertTrue($result);
    }

    public function testUpdatesection2()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitle_section_2('test10 title section 2'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setContent_section_2('test10 content section 2'));
        $result = $letterModel->updateSection2(19);
        $this->assertTrue($result);
    }

    public function testUpdateSection3()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitle_section_3('test10 title section 3'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setContent_section_3('test10 content section 3'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setConclusion('test10 conclusion'));
        $result = $letterModel->updateSection3(19);
        $this->assertTrue($result);
    }

    public function testUpdateStyle()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setLetter_style_id(1));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setLetter_animation_id(1));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setName('test10'));
        $result = $letterModel->updateStyle(19);
        $this->assertTrue($result);
    }
}