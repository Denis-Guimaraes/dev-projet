<?php
namespace MotivOnline\Model;

use MotivOnline\Util\Database;
use PDO;

class LetterModel
{
    protected $id;
    protected $name;
    protected $link;
    protected $date;
    protected $title;
    protected $object;
    protected $title_section_1;
    protected $content_section_1;
    protected $title_section_2;
    protected $content_section_2;
    protected $title_section_3;
    protected $content_section_3;
    protected $conclusion;
    protected $letter_style_id;
    protected $letter_animation_id;
    protected $user_id;
    protected $company_id;
    protected $company_name;
    protected $style_name;
    protected $animation_name;

    const TABLE_NAME = 'letter';

    public function findAllLetter(int $userId)
    {
        // SQL request
        $sql = 'SELECT
                    letter.id,
                    letter.name,
                    letter.link,
                    letter.title,
                    letter.user_id,
                    letter.company_id,
                    company.name as company_name
                FROM ' . self::TABLE_NAME . '
                LEFT JOIN company ON letter.company_id = company.id
                WHERE letter.user_id = :userId';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function findLetter(int $letterId)
    {
        // SQL request
        $sql = 'SELECT
                    letter.id,
                    letter.name,
                    letter.link,
                    letter.date,
                    letter.title,
                    letter.object,
                    letter.title_section_1,
                    letter.content_section_1,
                    letter.title_section_2,
                    letter.content_section_2,
                    letter.title_section_3,
                    letter.content_section_3,
                    letter.conclusion,
                    letter.letter_style_id,
                    letter_style.name as style_name,
                    letter.letter_animation_id,
                    letter_animation.name as animation_name,
                    letter.user_id,
                    letter.company_id,
                    company.name as company_name
                FROM ' . self::TABLE_NAME . '
                LEFT JOIN letter_style ON letter.letter_style_id = letter_style.id
                LEFT JOIN letter_animation ON letter.letter_animation_id = letter_animation.id
                LEFT JOIN company ON letter.company_id = company.id
                WHERE letter.user_id = :userId AND letter.id = :letterId';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':userId', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':letterId', $letterId, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    public function insert()
    {
         // SQL request
         $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (
            `name`,
            `link`,
            `title`,
            `user_id`
        )
        VALUES (
            :name,
            :link,
            :title,
            :user_id
        )';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':link', $this->link, PDO::PARAM_STR);
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1 ) {
            return false;
        }
        $this->id = $pdo->lastInsertId();
        return $this;
    }

    public function updateHeader(int $letterId)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `date` = :date,
                    `title` = :title,
                    `object` = :object
                WHERE `id` = :id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letterId, PDO::PARAM_INT);
        $pdoStatement->bindValue(':date', $this->date, PDO::PARAM_STR);
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':object', $this->object, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1 ) {
            return false;
        }
        return true;
    }

    public function updateSection1(int $letterId)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `title_section_1` = :title_section_1,
                    `content_section_1` = :content_section_1
                WHERE `id` = :id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letterId, PDO::PARAM_INT);
        $pdoStatement->bindValue(':title_section_1', $this->title_section_1, PDO::PARAM_STR);
        $pdoStatement->bindValue(':content_section_1', $this->content_section_1, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1 ) {
            return false;
        }
        return true;
    }

    public function updateSection2(int $letterId)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `title_section_2` = :title_section_2,
                    `content_section_2` = :content_section_2
                WHERE `id` = :id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letterId, PDO::PARAM_INT);
        $pdoStatement->bindValue(':title_section_2', $this->title_section_2, PDO::PARAM_STR);
        $pdoStatement->bindValue(':content_section_2', $this->content_section_2, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1 ) {
            return false;
        }
        return true;
    }

    public function updateSection3(int $letterId)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `title_section_3` = :title_section_3,
                    `content_section_3` = :content_section_3,
                    `conclusion` = :conclusion
                WHERE `id` = :id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letterId, PDO::PARAM_INT);
        $pdoStatement->bindValue(':title_section_3', $this->title_section_3, PDO::PARAM_STR);
        $pdoStatement->bindValue(':content_section_3', $this->content_section_3, PDO::PARAM_STR);
        $pdoStatement->bindValue(':conclusion', $this->conclusion, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1 ) {
            return false;
        }
        return true;
    }

    public function updateStyle(int $letterId)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `name` = :name,
                    `letter_style_id` = :letter_style_id,
                    `letter_animation_id` = :letter_animation_id
                WHERE `id` = :id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letterId, PDO::PARAM_INT);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':letter_style_id', $this->letter_style_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':letter_animation_id', $this->letter_animation_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1 ) {
            return false;
        }
        return true;
    }

    public function delete(int $letterId)
    {
        // SQL request
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letterId, PDO::PARAM_INT);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1 ) {
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

    public function getLink()
    {
        return $this->link;
    }

    public function setLink(string $link)
    {
        $this->link = $link;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }
 
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function getObject()
    {
        return $this->object;
    }

    public function setObject(string $object)
    {
        $this->object = $object;

        return $this;
    }

    public function getTitle_section_1()
    {
        return $this->title_section_1;
    }

    public function setTitle_section_1(string $title_section_1)
    {
        $this->title_section_1 = $title_section_1;

        return $this;
    }

    public function getContent_section_1()
    {
        return $this->content_section_1;
    }

    public function setContent_section_1(string $content_section_1)
    {
        $this->content_section_1 = $content_section_1;

        return $this;
    }

    public function getTitle_section_2()
    {
        return $this->title_section_2;
    }

    public function setTitle_section_2(string $title_section_2)
    {
        $this->title_section_2 = $title_section_2;

        return $this;
    }

    public function getContent_section_2()
    {
        return $this->content_section_2;
    }

    public function setContent_section_2(string $content_section_2)
    {
        $this->content_section_2 = $content_section_2;

        return $this;
    }

    public function getTitle_section_3()
    {
        return $this->title_section_3;
    }

    public function setTitle_section_3(string $title_section_3)
    {
        $this->title_section_3 = $title_section_3;

        return $this;
    }

    public function getContent_section_3()
    {
        return $this->content_section_3;
    }

    public function setContent_section_3(string $content_section_3)
    {
        $this->content_section_3 = $content_section_3;

        return $this;
    }
 
    public function getConclusion()
    {
        return $this->conclusion;
    }

    public function setConclusion(string $conclusion)
    {
        $this->conclusion = $conclusion;

        return $this;
    }

    public function getLetter_style_id()
    {
        return $this->letter_style_id;
    }
 
    public function setLetter_style_id(int $letter_style_id)
    {
        $this->letter_style_id = $letter_style_id;

        return $this;
    }

    public function getLetter_animation_id()
    {
        return $this->letter_animation_id;
    }

    public function setLetter_animation_id(int $letter_animation_id)
    {
        $this->letter_animation_id = $letter_animation_id;

        return $this;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }
 
    public function setUser_id(int $user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
 
    public function getCompany_id()
    {
        return $this->company_id;
    }

    public function setCompany_id(int $company_id)
    {
        $this->company_id = $company_id;

        return $this;
    }
 
    public function getCompany_name()
    {
        return $this->company_name;
    }

    public function setCompany_name(string $company_name)
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getStyle_name()
    {
        return $this->style_name;
    }

    public function setStyle_name($style_name)
    {
        $this->style_name = $style_name;

        return $this;
    }

    public function getAnimation_name()
    {
        return $this->animation_name;
    }
 
    public function setAnimation_name($animation_name)
    {
        $this->animation_name = $animation_name;

        return $this;
    }
}