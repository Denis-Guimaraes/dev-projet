<?php
namespace MotivOnline\Model;

use MotivOnline\Util\Database;
use PDO;

class CompanyModel
{
    protected $id;
    protected $name;
    protected $recipient_name;
    protected $zip_code;
    protected $city;
    protected $address;
    protected $user_id;

    const TABLE_NAME = 'company';

    public function findCompany(int $company_id)
    {
        // SQL request
        $sql = 'SELECT
                    `id`,
                    `name`,
                    `recipient_name`,
                    `zip_code`,
                    `city`,
                    `address`,
                    `user_id`
                FROM ' . self::TABLE_NAME . '
                WHERE id = :id AND user_id = :user_id';
        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $company_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }
    public function insert()
    {
        // SQL request
        $sql = 'INSERT INTO ' . self::TABLE_NAME . '(
                    `name`,
                    `recipient_name`,
                    `zip_code`,
                    `city`,
                    `address`,
                    `user_id`
                )
                VALUES (
                    :name,
                    :recipient_name,
                    :zip_code,
                    :city,
                    :address,
                    :user_id
                )';
        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':recipient_name', $this->recipient_name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':zip_code', $this->zip_code, PDO::PARAM_STR);
        $pdoStatement->bindValue(':city', $this->city, PDO::PARAM_STR);
        $pdoStatement->bindValue(':address', $this->address, PDO::PARAM_STR);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        $this->id = $pdo->lastInsertId();
        return true;
    }
    public function update(int $company_id)
    {
        // SQL request
        $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `name` = :name,
                    `recipient_name` = :recipient_name,
                    `zip_code` = :zip_code,
                    `city` = :city,
                    `address` = :address
                WHERE `id` = :id AND `user_id` = :user_id
                ';
        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $company_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':recipient_name', $this->recipient_name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':zip_code', $this->zip_code, PDO::PARAM_STR);
        $pdoStatement->bindValue(':city', $this->city, PDO::PARAM_STR);
        $pdoStatement->bindValue(':address', $this->address, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        $this->id = $companyId;
        return true;
    }
    public function delete(int $company_id)
    {
        // SQL request
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id AND `user_id` = :user_id';
        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $company_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        return true;
    }

    // Getters and Setters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getRecipientName()
    {
        return $this->recipient_name;
    }

    public function setRecipientName(string $recipient_name)
    {
        $this->recipient_name = $recipient_name;
        return $this;
    }
 
    public function getZipCode()
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code)
    {
        $this->zip_code = $zip_code;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
        return $this;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }
}
