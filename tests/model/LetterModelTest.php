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
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $result = $letterModel->findLetter(19);
        $this->assertInstanceOf(LetterModel::class, $result);
    }

    public function testCreateLetter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setName('test2 letter'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setLink(uniqid()));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitle('test2 letter'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $result = $letterModel->insert();
        $this->assertTrue($result);
        return (int) $result->getId();
    }

    public function testUpdateHeaderLetter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitle('test10 title'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setDate(date("Y-m-d H:i:s")));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setObject('test10 object'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $result = $letterModel->updateHeader(19);
        $this->assertTrue($result);
    }

    public function testUpdatesection1Letter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitleSection1('test10 title section 1'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setContentSection1('test10 content section 1'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $result = $letterModel->updateSection1(19);
        $this->assertTrue($result);
    }

    public function testUpdatesection2Letter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitleSection2('test10 title section 2'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setContentSection2('test10 content section 2'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $result = $letterModel->updateSection2(19);
        $this->assertTrue($result);
    }

    public function testUpdateSection3Letter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setTitleSection3('test10 title section 3'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setContentSection3('test10 content section 3'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setConclusion('test10 conclusion'));
        $result = $letterModel->updateSection3(19);
        $this->assertTrue($result);
    }

    public function testUpdateStyleLetter()
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setLetterStyleId(1));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setLetterAnimationId(1));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setName('test10'));
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $result = $letterModel->updateStyle(19);
        $this->assertTrue($result);
    }

    /**
     * @depends testCreateLetter
     */
    public function testDeleteLetter(int $letterId)
    {
        $letterModel = new LetterModel();
        $this->assertInstanceOf(LetterModel::class, $letterModel->setUserId(36));
        $result = $letterModel->delete($letterId);
        $this->assertTrue($result);
    }
}
