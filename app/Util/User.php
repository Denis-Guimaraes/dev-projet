<?php
namespace MotivOnline\Util;

use MotivOnline\Model\UserModel;

abstract class User
{
    public static function isConnected()
    {
        if (empty($_SESSION['connectedUser'])) {
            return false;
        }
        return true;
    }

    public static function getConnectedUser()
    {
        if (self::isConnected()) {
            $userData = $_SESSION['connectedUser'];
        } else {
            $userData = [];
        }
        return $userData;
    }

    public static function connect(UserModel $userModel)
    {
        $_SESSION['connectedUser'] = $userModel;
        return true;
    }

    public static function disconnect()
    {
        unset($_SESSION['connectedUser']);
        return true;
    }
}