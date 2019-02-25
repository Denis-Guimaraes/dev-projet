<?php
namespace MotivOnline\Model;

use MotivOnline\Util\Database;
use PDO;

class LetterModel
{
    protected $id;
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

    const TABLE_NAME = 'letter';

    public static function findAllLetter(int $userId)
    {
        // SQL request
        $sql = 'SELECT
                    letter.id,
                    letter.link,
                    letter.title,
                    letter.company_id,
                    company.name as company_name
                FROM ' . self::TABLE_NAME . '
                INNER JOIN company ON company_id = company.id
                WHERE user_id = :userId';

        // Prepare and execute request
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }
} 