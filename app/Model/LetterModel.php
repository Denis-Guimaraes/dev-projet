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
    protected $company_recipient_name;
    protected $company_zip_code;
    protected $company_city;
    protected $company_address;
    protected $style_name;
    protected $animation_name;

    const TABLE_NAME = 'letter';

    public function findAllLetter(int $user_id)
    {
        // SQL request
        $sql = 'SELECT
                    letter.id,
                    letter.name,
                    letter.link,
                    letter.object,
                    letter.user_id,
                    letter.company_id,
                    company.name as company_name
                FROM ' . self::TABLE_NAME . '
                LEFT JOIN company ON letter.company_id = company.id
                WHERE letter.user_id = :user_id';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function findLetter(int $letter_id)
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
                    company.name as company_name,
                    company.recipient_name as company_recipient_name,
                    company.zip_code as company_zip_code,
                    company.city as company_city,
                    company.address as company_address
                FROM ' . self::TABLE_NAME . '
                LEFT JOIN letter_style ON letter.letter_style_id = letter_style.id
                LEFT JOIN letter_animation ON letter.letter_animation_id = letter_animation.id
                LEFT JOIN company ON letter.company_id = company.id
                WHERE letter.user_id = :user_id AND letter.id = :letter_id';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':letter_id', $letter_id, PDO::PARAM_INT);
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
            `user_id`,
            `company_id`
        )
        VALUES (
            :name,
            :link,
            :user_id,
            :company_id
        )';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':link', $this->link, PDO::PARAM_STR);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':company_id', $this->company_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        $this->id = $pdo->lastInsertId();
        return true;
    }

    public function updateHeader(int $letter_id)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `date` = :date,
                    `title` = :title,
                    `object` = :object
                WHERE `id` = :id AND `user_id` = :user_id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letter_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':date', $this->date, PDO::PARAM_STR);
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':object', $this->object, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        return true;
    }

    public function updateSection1(int $letter_id)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `title_section_1` = :title_section_1,
                    `content_section_1` = :content_section_1
                WHERE `id` = :id AND `user_id` = :user_id
                    ';
    
        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letter_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':title_section_1', $this->title_section_1, PDO::PARAM_STR);
        $pdoStatement->bindValue(':content_section_1', $this->content_section_1, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        return true;
    }

    public function updateSection2(int $letter_id)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `title_section_2` = :title_section_2,
                    `content_section_2` = :content_section_2
                WHERE `id` = :id AND `user_id` = :user_id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letter_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':title_section_2', $this->title_section_2, PDO::PARAM_STR);
        $pdoStatement->bindValue(':content_section_2', $this->content_section_2, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        return true;
    }

    public function updateSection3(int $letter_id)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `title_section_3` = :title_section_3,
                    `content_section_3` = :content_section_3,
                    `conclusion` = :conclusion
                WHERE `id` = :id AND `user_id` = :user_id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letter_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':title_section_3', $this->title_section_3, PDO::PARAM_STR);
        $pdoStatement->bindValue(':content_section_3', $this->content_section_3, PDO::PARAM_STR);
        $pdoStatement->bindValue(':conclusion', $this->conclusion, PDO::PARAM_STR);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        return true;
    }

    public function updateStyle(int $letter_id)
    {
         // SQL request
         $sql = 'UPDATE ' . self::TABLE_NAME . ' SET
                    `name` = :name,
                    `letter_style_id` = :letter_style_id,
                    `letter_animation_id` = :letter_animation_id
                WHERE `id` = :id AND `user_id` = :user_id
                ';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letter_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':letter_style_id', $this->letter_style_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':letter_animation_id', $this->letter_animation_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        // Check Result
        $affectedRow = $pdoStatement->rowCount();
        if ($affectedRow < 1) {
            return false;
        }
        return true;
    }

    public function delete(int $letter_id)
    {
        // SQL request
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id AND `user_id` = :user_id';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $letter_id, PDO::PARAM_INT);
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

    public function getTitleSection1()
    {
        return $this->title_section_1;
    }

    public function setTitleSection1(string $title_section_1)
    {
        $this->title_section_1 = $title_section_1;

        return $this;
    }

    public function getContentSection1()
    {
        return $this->content_section_1;
    }

    public function setContentSection1(string $content_section_1)
    {
        $this->content_section_1 = $content_section_1;

        return $this;
    }

    public function getTitleSection2()
    {
        return $this->title_section_2;
    }

    public function setTitleSection2(string $title_section_2)
    {
        $this->title_section_2 = $title_section_2;

        return $this;
    }

    public function getContentSection2()
    {
        return $this->content_section_2;
    }

    public function setContentSection2(string $content_section_2)
    {
        $this->content_section_2 = $content_section_2;

        return $this;
    }

    public function getTitleSection3()
    {
        return $this->title_section_3;
    }

    public function setTitleSection3(string $title_section_3)
    {
        $this->title_section_3 = $title_section_3;

        return $this;
    }

    public function getContentSection3()
    {
        return $this->content_section_3;
    }

    public function setContentSection3(string $content_section_3)
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

    public function getLetterStyleId()
    {
        return $this->letter_style_id;
    }
 
    public function setLetterStyleId(int $letter_style_id)
    {
        $this->letter_style_id = $letter_style_id;

        return $this;
    }

    public function getLetterAnimationId()
    {
        return $this->letter_animation_id;
    }

    public function setLetterAnimationId(int $letter_animation_id)
    {
        $this->letter_animation_id = $letter_animation_id;

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
 
    public function getCompanyId()
    {
        return $this->company_id;
    }

    public function setCompanyId(int $company_id)
    {
        $this->company_id = $company_id;

        return $this;
    }
 
    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name)
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getCompanyRecipientName()
    {
        return $this->company_recipient_name;
    }

    public function setCompanyRecipientName(string $company_recipient_name)
    {
        $this->company_recipient_name = $company_recipient_name;

        return $this;
    }

    public function getCompanyZipCode()
    {
        return $this->company_zip_code;
    }

    public function setCompanyZipCode(string $company_zip_code)
    {
        $this->company_zip_code = $company_zip_code;

        return $this;
    }

    public function getCompanyCity()
    {
        return $this->company_city;
    }

    public function setCompanyCity(string $company_city)
    {
        $this->company_city = $company_city;

        return $this;
    }

    public function getCompanyAddress()
    {
        return $this->company_address;
    }
 
    public function setCompanyAddress(string $company_address)
    {
        $this->company_address = $company_address;

        return $this;
    }

    public function getStyleName()
    {
        return $this->style_name;
    }

    public function setStyleName(string $style_name)
    {
        $this->style_name = $style_name;

        return $this;
    }

    public function getAnimationName()
    {
        return $this->animation_name;
    }
 
    public function setAnimationName(string $animation_name)
    {
        $this->animation_name = $animation_name;

        return $this;
    }
}
