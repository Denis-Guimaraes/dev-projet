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
        $this->assertInstanceOf(LetterModel::class, $allLetter);
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
}