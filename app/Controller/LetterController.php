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
        // Set data and return newLetter view
        $this->templateName = 'letter/newLetter';
        $this->data['error'] = $errorList;
        $this->show($this->templateName, $this->data);
    }

    public function updateLetter(array $params)
    {
        if (!User::isConnected()) {
            header('Location: '. $this->getRouter()->generate('main_home'));
        }
        $errorList = [];
        $section = $params['section'];
        $letterId = $params['id'];

        switch ($section) {
            case 'entete':
                // Set parameters
                $date = (isset($_POST['date'])) ? $_POST['date'] : '';
                $title = (isset($_POST['title'])) ? $_POST['title'] : '';
                $object = (isset($_POST['object'])) ? $_POST['object'] : '';
                // Set letter and update it in database
                $letterModel = new LetterModel();
                $letterModel->setDate($date);
                $letterModel->setTitle($title);
                $letterModel->setObject($object);
                $result = $letterModel->updateHeader($letterId);
                if ($result) {
                    // Redirect to letter
                    $parameter = [
                        'id' => $letterId,
                    ];
                    header('Location: '. $this->getRouter()->generate('letter_view', $parameter));
                } else {
                    $errorList[] = 'Une erreur inattendue s\'est produite';
                }
                break;
            case 'section1':
                // Set parameters
                $title = (isset($_POST['title'])) ? $_POST['title'] : '';
                $content = (isset($_POST['content'])) ? $_POST['content'] : '';
                // Set letter and update it in database
                $letterModel = new LetterModel();
                $letterModel->setTitle_section_1($title);
                $letterModel->setContent_section_1($content);
                $result = $letterModel->updateSection1($letterId);
                if ($result) {
                    // Redirect to letter
                    $parameter = [
                        'id' => $letterId,
                    ];
                    header('Location: '. $this->getRouter()->generate('letter_view', $parameter));
                } else {
                    $errorList[] = 'Une erreur inattendue s\'est produite';
                }
                break;
            case 'section2':
                // Set parameters
                $title = (isset($_POST['title'])) ? $_POST['title'] : '';
                $content = (isset($_POST['content'])) ? $_POST['content'] : '';
                // Set letter and update it in database
                $letterModel = new LetterModel();
                $letterModel->setTitle_section_2($title);
                $letterModel->setContent_section_2($content);
                $result = $letterModel->updateSection2($letterId);
                if ($result) {
                    // Redirect to letter
                    $parameter = [
                        'id' => $letterId,
                    ];
                    header('Location: '. $this->getRouter()->generate('letter_view', $parameter));
                } else {
                    $errorList[] = 'Une erreur inattendue s\'est produite';
                }
                break;
            case 'section3':
                // Set parameters
                $title = (isset($_POST['title'])) ? $_POST['title'] : '';
                $content = (isset($_POST['content'])) ? $_POST['content'] : '';
                $conclusion = (isset($_POST['conclusion'])) ? $_POST['conclusion'] : '';
                // Set letter and update it in database
                $letterModel = new LetterModel();
                $letterModel->setTitle_section_3($title);
                $letterModel->setContent_section_3($content);
                $letterModel->setConclusion($conclusion);
                $result = $letterModel->updateSection3($letterId);
                if ($result) {
                    // Redirect to letter
                    $parameter = [
                        'id' => $letterId,
                    ];
                    header('Location: '. $this->getRouter()->generate('letter_view', $parameter));
                } else {
                    $errorList[] = 'Une erreur inattendue s\'est produite';
                }
                break;
            case 'style':
                // Set parameters
                $styleId = (isset($_POST['styleId'])) ? $_POST['styleId'] : '';
                $animationId = (isset($_POST['animationId'])) ? $_POST['animationId'] : '';
                $name = (isset($_POST['name'])) ? $_POST['name'] : '';
                // Set letter and update it in database
                $letterModel = new LetterModel();
                $letterModel->setLetter_style_id($styleId);
                $letterModel->setLetter_animation_id($animationId);
                $letterModel->setName($name);
                $result = $letterModel->updateStyle($letterId);
                if ($result) {
                    // Redirect to letter
                    $parameter = [
                        'id' => $letterId,
                    ];
                    header('Location: '. $this->getRouter()->generate('letter_view', $parameter));
                } else {
                    $errorList[] = 'Une erreur inattendue s\'est produite';
                }
                break;
            default:
                $this->sendHttpError(404, "Motiv'Online - erreur 404");
        }
        // Set data and return section view
        $this->templateName = 'letter/' . $section;
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