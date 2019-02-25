<?php
namespace MotivOnline\Controller;

use MotivOnline\Model\UserModel;
use MotivOnline\Util\User;

class UserController extends CoreController
{
    private $data;
    private $templateName;

    public function signup()
    {
        $errorList = [];
        // Check parameters
        if (!empty($_POST)) {
            $firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : '';
            $lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : '';
            $email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $password= (isset($_POST['password'])) ? $_POST['password'] : '';
            $confirmPassword = (isset($_POST['confirmPassword'])) ? $_POST['confirmPassword'] : '';
            $picture = (isset($_POST['picture'])) ? $_POST['picture'] : '';
            $phoneNumber = (isset($_POST['phoneNumber'])) ? $_POST['phoneNumber'] : '';
            $zipCode = (isset($_POST['zipCode'])) ? $_POST['zipCode'] : '';
            $city = (isset($_POST['city'])) ? $_POST['city'] : '';
            $adress = (isset($_POST['adress'])) ? $_POST['adress'] : '';

            if (empty($email)) {
                $errorList[] = 'Email vide';
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Email incorrect';
            }
            if (empty($password)) {
                $errorList[] = 'Mot de passe vide';
            } elseif( strlen($password) < 8) {
                $errorList[] = 'Mot de passe trop court, minimum 8 caractères';
            }
            if ($password !== $confirmPassword) {
                dump($password . ' = ' . $confirmPassword);
                $errorList[] = 'Les deux mots de passe sont différents';
            }
            
            if (empty($errorList)) {
                // Check if user already exist
                $userModel = UserModel::findByEmail($email);
                if ($userModel) {
                    $errorList[] = 'Le compte existe déjà pour cet email';
                } else {
                    // Set user and insert it in database
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $newUserModel= new UserModel();
                    $newUserModel->setFirstname($firstname);
                    $newUserModel->setLastname($lastname);
                    $newUserModel->setEmail($email);
                    $newUserModel->setPassword($encryptedPassword);
                    $newUserModel->setPicture($picture);
                    $newUserModel->setPhoneNumber($phoneNumber);
                    $newUserModel->setZipCode($zipCode);
                    $newUserModel->setCity($city);
                    $newUserModel->setAdress($adress);
                    $insert = $newUserModel->insert();

                    if ($insert) {
                        // Set success
                        $this->data['success'] = 'Vous pouvez maintenant vous connecter et profiter de notre service.';
                    } else {
                        $errorList[] = 'Une erreur inattendue s\'est produite';
                    }
                }
            }
        }
        // Set data and return signup view
        $this->templateName = 'user/signup';
        $this->data['error'] = $errorList;
        $this->show($this->templateName, $this->data);
    }

    public function signin()
    {
        $errorList = [];
        if (!empty($_POST)) {
            // Check parameters
            $email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $password = (isset($_POST['password'])) ? $_POST['password'] : '';

            // Check if user exist and if password match
            $userModel = UserModel::findByEmail($email);
            if (!empty($userModel)) {
                $passwordInBdd = $userModel->getPassword();
                if (password_verify($password ,$passwordInBdd)) {
                    // Connect user in session
                    User::connect($userModel);
                    // Redirect to profile
                    header('Location: '. $this->getRouter()->generate('user_profile'));
                } else {
                    $errorList[]= "L'identifiant ou le mot de passe est incorrecte";
                }
            } else {
                $errorList[]= "L'identifiant ou le mot de passe est incorrecte";
            }
        }
        // Set data and return sigin view
        $this->templateName = 'user/signin';
        $this->data['error'] = $errorList;
        $this->show($this->templateName, $this->data);
    }

    public function profile()
    {
        if(!User::isConnected()) {
            header('Location: '. $this->getRouter()->generate('main_home'));
        }
        $this->templateName = 'user/profile';
        $this->data['userLetter'] = [];
        $this->show($this->templateName, $this->data);
    }

    public function updateUser()
    {
        // todo
    }

    // Getters and Setters
    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;

        return $this;
    }
}