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
}