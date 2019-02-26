<?php
namespace MotivOnline\Controller;

use MotivOnline\Model\LetterModel;
use MotivOnline\Util\User;

class LetterController extends CoreController
{
    private $data;
    private $templateName;

    public function showAllLetter()
    {
        if (!User::isConnected()) {
            header('Location: '. $this->getRouter()->generate('main_home'));
        }
        $letterList = [];
        // Get user id
        $user = User::getConnectedUser();
        $userId = $user->getId();
        // Get letter list
        $letterModel = new LetterModel();
        $letterList = $letterModel->findAllLetter($userId);
        // Set data and return letterList view
        $this->templateName = 'letter/letterList';
        $this->data['letterList'] = $letterList;
        $this->show($this->templateName, $this->data);
    }

    public function showLetter(array $params)
    {
        if (!User::isConnected()) {
            header('Location: '. $this->getRouter()->generate('main_home'));
        }
        // Get parameters
        $letterId = $params['id'];
        $user = User::getConnectedUser();
        $userid = $user->getId();
        // Get letter
        $letterModel = new LetterModel();
        $letterModel->setUser_id($userid);
        $letter = $letterModel->findLetter($letterId);
        // Set data and return viewLetter view
        $this->templateName = 'letter/viewLetter';
        $this->data['letter'] = $letter;
        $this->show($this->templateName, $this->data);
    }

    public function createLetter()
    {
        if (!User::isConnected()) {
            header('Location: '. $this->getRouter()->generate('main_home'));
        }
        $errorList = [];
        // Check and set parameters
        if (!empty($_POST)) {
            $name = (isset($_POST['name'])) ? $_POST['name'] : '';
            $title = (isset($_POST['title'])) ? $_POST['title'] : '';
            $link = uniqid();
            $user = User::getConnectedUser();
            $userId = $user->getId();

            // Set letter and insert it in database
            $letterModel = new LetterModel();
            $letterModel->setName($name);
            $letterModel->setLink($link);
            $letterModel->setTitle($title);
            $letterModel->setUser_id($userId);
            $letter = $letterModel->insert();

            if ($letter instanceof LetterModel) {
                // Redirect to letter
                $parameter = [
                    'id' => $letter->getId(),
                ];
                header('Location: '. $this->getRouter()->generate('letter_view', $parameter));
            } else {
                $errorList[] = 'Une erreur inattendue s\'est produite';
            }
        }
        // Set data and return letterList view
        $this->templateName = 'letter/newLetter';
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