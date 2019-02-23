<?php
namespace MotivOnline\Controller;

use MotivOnline\Model\UserModel;

class UserController extends CoreController
{
    private $data;
    private $TemplateName;

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

            if (empty($firstname)) {
                $errorList[] = 'Prénom vide';
            }
            if (empty($lastname)) {
                $errorList[] = 'Nom vide';
            }
            if (empty($email)) {
                $errorList[] = 'Email vide';
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Email incorrect';
            }
            if (empty($password)) {
                $errorList[] = 'Password vide';
            } elseif( strlen($password) < 8) {
                $errorList[] = 'Password trop court, minimum 8 char';
            }
            if ($password !== $confirmPassword) {
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
                    // Return view
                    if ($insert) {
                        $this->TemplateName = 'main/home';
                        $this->data['success'] = 'Bienvenue sur Motiv\'Online, vous pouvez dès à présent vous connecter.';
                        $this->show($this->TemplateName, $this->data);
                    } else {
                        $errorList[] = 'Une erreur inattendue s\'est produite.';
                    }
                }
            }
        }
        // Return view
        $this->TemplateName = 'main/home';
        $this->data['error'] = $errorList;
        $this->show($this->TemplateName, $this->data);
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
        return $this->TemplateName;
    }

    public function setTemplateName($TemplateName)
    {
        $this->TemplateName = $TemplateName;

        return $this;
    }
}