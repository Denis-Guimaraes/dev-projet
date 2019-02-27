<?php
namespace Test\MotivOnline\Model;

use PHPUnit\Framework\TestCase;
use MotivOnline\Model\CompanyModel;

class CompanyModelTest extends TestCase
{
    public function testFinfCompany()
    {
        $companyModel = new CompanyModel();
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setUser_id(36));
        $result = $companyModel->findCompany(1);
        $this->assertInstanceOf(CompanyModel::class, $result);
    }

    public function testCreateCompany()
    {
        $companyModel = new CompanyModel();
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setName('test2 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setRecipient_name('test2 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setZip_code('test2 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setCity('test2 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setAddress('test2 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setUser_id(36));
        $result = $companyModel->insert();
        $this->assertTrue($result);
        return (int) $companyModel->getId();
    }

    /**
     * @depends testCreateCompany
     */
    public function testUpdateCompany(int $companyId)
    {
        $companyModel = new CompanyModel();
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setName('test3 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setRecipient_name('test3 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setZip_code('test3 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setCity('test3 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setAddress('test3 company'));
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setUser_id(36));
        $result = $companyModel->update($companyId);
        $this->assertTrue($result);
    }

    /**
     * @depends testCreateCompany
     */
    public function testDeleteCompany(int $companyId)
    {
        $companyModel = new CompanyModel();
        $this->assertInstanceOf(CompanyModel::class, $companyModel->setUser_id(36));
        $result = $companyModel->delete($companyId);
        $this->assertTrue($result);
    }
}