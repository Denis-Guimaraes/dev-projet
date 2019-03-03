<?php
namespace MotivOnline\Model;

use MotivOnline\Util\Database;
use PDO;

class UserModel
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $picture;
    protected $phone_number;
    protected $zip_code;
    protected $city;
    protected $address;

    const TABLE_NAME = 'user';

    public function findByEmail(string $email)
    {
        // SQL request
        $sql = 'SELECT
                    `id`,
                    `firstname`,
                    `lastname`,
                    `email`,
                    `password`,
                    `picture`,
                    `phone_number`,
                    `zip_code`,
                    `city`,
                    `address`
                FROM ' . self::TABLE_NAME . '
                WHERE email = :email';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    public function insert()
    {
        // SQL request
        $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (
                    `firstname`,
                    `lastname`,
                    `email`,
                    `password`,
                    `picture`,
                    `phone_number`,
                    `zip_code`,
                    `city`,
                    `address`
                )
                VALUES (
                    :firstname,
                    :lastname,
                    :email,
                    :password,
                    :picture,
                    :phone_number,
                    :zip_code,
                    :city,
                    :address
                )';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindValue(':phone_number', $this->phone_number, PDO::PARAM_STR);
        $pdoStatement->bindValue(':zip_code', $this->zip_code, PDO::PARAM_STR);
        $pdoStatement->bindValue(':city', $this->city, PDO::PARAM_STR);
        $pdoStatement->bindValue(':address', $this->address, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        $this->id = $pdo->lastInsertId();
        return true;
    }

    public function update()
    {
        // SQL request
        $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `firstname` = :firstname,
                    `lastname` = :lastname,
                    `picture` = :picture,
                    `phone_number` = :phone_number,
                    `zip_code` = :zip_code,
                    `city` = :city,
                    `address` = :address
                WHERE `id` = :id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindValue(':phone_number', $this->phone_number, PDO::PARAM_STR);
        $pdoStatement->bindValue(':zip_code', $this->zip_code, PDO::PARAM_STR);
        $pdoStatement->bindValue(':city', $this->city, PDO::PARAM_STR);
        $pdoStatement->bindValue(':address', $this->address, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        return true;
    }

    public function delete()
    {
        // SQL request
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
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

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture(string $picture)
    {
        $this->picture = $picture;
        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number)
    {
        $this->phone_number = $phone_number;
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
}
