<?php
namespace MotivOnline\Model;

use MotivOnline\Util\Database;
use PDO;

class LetterAnimationModel
{
    protected $id;
    protected $name;
    protected $example;

    const TABLE_NAME = 'letter_animation';

    public function findAllLetterAnimation()
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

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getExample()
    {
        return $this->example;
    }

    public function setExample($example)
    {
        $this->example = $example;

        return $this;
    }
}
