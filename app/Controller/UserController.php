<?php
namespace MotivOnline\Controller;

use MotivOnline\Model\UserModel;
use MotivOnline\Util\User;
use MotivOnline\Util\Mailer;

class UserController extends CoreController
{
    private $data;
    private $templateName;

    public function signup()
    {
        if (User::isConnected()) {
            $this->redirect('letter_list');
        }
        $errorList = [];

        if (!empty($_POST)) {
            // Check and set parameters
            $firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : '';
            $lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : '';
            $email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $password= (isset($_POST['password'])) ? $_POST['password'] : '';
            $confirmPassword = (isset($_POST['confirmPassword'])) ? $_POST['confirmPassword'] : '';
            $picture = (isset($_POST['picture'])) ? $_POST['picture'] : '';
            $phoneNumber = (isset($_POST['phoneNumber'])) ? $_POST['phoneNumber'] : '';
            $zipCode = (isset($_POST['zipCode'])) ? $_POST['zipCode'] : '';
            $city = (isset($_POST['city'])) ? $_POST['city'] : '';
            $address = (isset($_POST['address'])) ? $_POST['address'] : '';

            if (empty($email)) {
                $errorList[] = 'Email vide';
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Email incorrect';
            }
            if (empty($password)) {
                $errorList[] = 'Mot de passe vide';
            } elseif (strlen($password) < 8) {
                $errorList[] = 'Mot de passe trop court, minimum 8 caractères';
            }
            if ($password !== $confirmPassword) {
                $errorList[] = 'Les deux mots de passe sont différents';
            }
            
            if (empty($errorList)) {
                // Check if user already exist
                $userModel = new UserModel();
                $user = $userModel->findByEmail($email);
                if (!empty($user)) {
                    $errorList[] = 'Le compte existe déjà pour cet email';
                } else {
                    // Set user and insert it in database
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $userModel->setFirstname($firstname);
                    $userModel->setLastname($lastname);
                    $userModel->setEmail($email);
                    $userModel->setPassword($encryptedPassword);
                    $userModel->setPhoneNumber($phoneNumber);
                    $userModel->setZipCode($zipCode);
                    $userModel->setCity($city);
                    $userModel->setAddress($address);
                    $insert = $userModel->insert();

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
        if (User::isConnected()) {
            $this->redirect('letter_list');
        }
        $errorList = [];

        if (!empty($_POST)) {
            // Check and set parameters
            $email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $password = (isset($_POST['password'])) ? $_POST['password'] : '';

            // Check if user exist and if password match
            $userModel = new UserModel();
            $user = $userModel->findByEmail($email);
            if (!empty($user)) {
                $passwordInBdd = $user->getPassword();
                if (password_verify($password, $passwordInBdd)) {
                    // Connect user in session
                    User::connect($user);
                    // Redirect to profile
                    $this->redirect('letter_list');
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
        if (!User::isConnected()) {
            $this->redirect('main_home');
        }
        $this->templateName = 'user/profile';
        $this->show($this->templateName);
    }

    public function updateUser()
    {
        $errorList= [];
        if (!User::isConnected()) {
            $this->redirect('main_home');
        }

        if (!empty($_POST)) {
            // Check and set parameters
            $firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : '';
            $lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : '';
            $picture = (isset($_POST['picture'])) ? $_POST['picture'] : '';
            $phoneNumber = (isset($_POST['phoneNumber'])) ? $_POST['phoneNumber'] : '';
            $zipCode = (isset($_POST['zipCode'])) ? $_POST['zipCode'] : '';
            $city = (isset($_POST['city'])) ? $_POST['city'] : '';
            $address = (isset($_POST['address'])) ? $_POST['address'] : '';

            // Set user and update it in database
            $user = User::getConnectedUser();
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setPhoneNumber($phoneNumber);
            $user->setZipCode($zipCode);
            $user->setCity($city);
            $user->setAddress($address);
            $userUpdate = $user->update();
            
            if ($userUpdate) {
                // Set success
                $this->data['success'] = 'Vos informations personnelles ont bien été modifiées.';
            } else {
                $errorList[] = 'Aucune modification n\'a été effectuée.';
            }
        }
        // Set data and return profile view
        $this->templateName = 'user/profile';
        $this->data['error'] = $errorList;
        $this->show($this->templateName, $this->data);
    }

    public function signout()
    {
        User::disconnect();
        $this->redirect('main_home');
    }

    public function deleteUser()
    {
        if (!User::isConnected()) {
            $this->redirect('main_home');
        }
        $user = User::getConnectedUser();
        $user->delete();
        User::disconnect();
        $this->redirect('main_home');
    }

    public function changePasswordLink()
    {
        $errorList = [];
        if (!User::isConnected()) {
            if (!empty($_POST)) {
                // Check email
                $email = (isset($_POST['email'])) ? $_POST['email'] : '';
                if (empty($email)) {
                    $errorList[] = 'Email vide';
                } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $errorList[] = 'Email incorrect';
                }
                // Get user data
                $userModel = new UserModel();
                $user = $userModel->findByEmail($email);
                if (!empty($user)) {
                    // Set link
                    $hash = uniqid();
                    $user->setHash($hash);
                    $user->update();
                    $link = $this->baseUrl . $this->router->generate('user_changePassword_view', ['hash' => $hash]);
                } else {
                    $errorList[] = 'Email inconnu';
                }
                if (empty($errorList)) {
                    // Send email and redirect
                    $mailer = new Mailer();
                    $mailer->sendChangePasswordLink($email, $link);
                    $this->redirect('user_signin');
                }
            }
            // Set data and return forgetPassword view
            $this->templateName = 'user/forgetPassword';
            $this->data['error'] = $errorList;
            $this->show($this->templateName, $this->data);
        }

        $user = User::getConnectedUser();
        // Set link
        $hash = uniqid();
        $user->setHash($hash);
        $user->update();
        $link = $this->baseUrl . $this->router->generate('user_changePassword_view', ['hash' => $hash]);
        $userEmail = $user->getEmail();
        $mailer = new Mailer();
        $mailer->sendChangePasswordLink($userEmail, $link);
        $this->signout();
    }

    public function changePassword(array $params)
    {
        $errorList = [];
        $hash = $params['hash'];

        if (!empty($_POST)) {
            // Check and set parameters
            $email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $password= (isset($_POST['password'])) ? $_POST['password'] : '';
            $confirmPassword = (isset($_POST['confirmPassword'])) ? $_POST['confirmPassword'] : '';
            if (empty($email)) {
                $errorList[] = 'Email vide';
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Email incorrect';
            }
            if (empty($password)) {
                $errorList[] = 'Mot de passe vide';
            } elseif (strlen($password) < 8) {
                $errorList[] = 'Mot de passe trop court, minimum 8 caractères';
            }
            if ($password !== $confirmPassword) {
                $errorList[] = 'Les deux mots de passe sont différents';
            }
            // Get user and check if hash match
            $userModel = new UserModel();
            $user = $userModel->findByEmail($email);
            $hashInBdd = $user->getHash();
            if ($hash === $hashInBdd) {
                // Encrypt new password and set it in database
                $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                $user->setPassword($encryptedPassword);
                $user->setHash('');
                $user->update();
                $this->signout();
            } else {
                $this->sendHttpError(401, "Motiv'Online - erreur 401");
            }
        }
        // Set data and return changePassword view
        $this->templateName = 'user/changePassword';
        $this->data['error'] = $errorList;
        $this->show($this->templateName, $this->data);
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
