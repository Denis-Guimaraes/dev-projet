<?php
namespace MotivOnline\Model;

use MotivOnline\Util\Database;
use PDO;

class LetterStyleModel
{
    protected $id;
    protected $name;
    protected $example;

    const TABLE_NAME = 'letter_style';

    public function findAllLetterStyle()
    {
        // SQL request
        $sql = 'SELECT
                    `id`,
                    `name`,
                    `example`
                FROM ' . self::TABLE_NAME;
        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
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

    public function getExample()
    {
        return $this->example;
    }

    public function setExample(string $example)
    {
        $this->example = $example;

        return $this;
    }
}
