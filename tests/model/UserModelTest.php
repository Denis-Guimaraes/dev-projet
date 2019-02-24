<?php
namespace Test\MotivOnline\Model;

use PHPUnit\Framework\TestCase;
use MotivOnline\Model\UserModel;

class UserModelTest extends TestCase
{
    public function testFindUserByEmail()
    {
        $userModel = new UserModel();
        $this->assertInstanceOf(UserModel::class, $userModel->findByEmail('test@test.test'));
    }

    public function testCreateUser()
    {
        $userModel = new UserModel();
        $this->assertInstanceOf(UserModel::class, $userModel->setFirstname('test1'));
        $this->assertInstanceOf(UserModel::class, $userModel->setLastname('test1'));
        $this->assertInstanceOf(UserModel::class, $userModel->setEmail('test1'));
        $this->assertInstanceOf(UserModel::class, $userModel->setPassword('test1'));
        $this->assertTrue(true, $userModel->insert());
    }
}