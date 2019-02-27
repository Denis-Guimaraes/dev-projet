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

    public function testUpdateUser()
    {
        $userModel = new UserModel();
        $user = $userModel->findByEmail('test1');
        $this->assertInstanceOf(UserModel::class, $user->setFirstname('test4'));
        $this->assertInstanceOf(UserModel::class, $user->setLastname('test4'));
        $this->assertInstanceOf(UserModel::class, $user->setPhone_number('test4'));
        $this->assertInstanceOf(UserModel::class, $user->setAddress('test4'));
        $this->assertInstanceOf(UserModel::class, $user->setZip_code('test4'));
        $this->assertInstanceOf(UserModel::class, $user->setCity('test4'));
        $this->assertTrue(true, $user->update());
    }
}