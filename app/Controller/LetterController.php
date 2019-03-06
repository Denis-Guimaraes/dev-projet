<?php
namespace MotivOnline\Controller;

use MotivOnline\Model\LetterModel;
use MotivOnline\Util\User;
use MotivOnline\Model\CompanyModel;
use MotivOnline\Model\LetterStyleModel;
use MotivOnline\Model\LetterAnimationModel;

class LetterController extends CoreController
{
    private $data;
    private $templateName;

    public function showAllLetter()
    {
        if (!User::isConnected()) {
            $this->redirect('main_home');
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
            $this->redirect('main_home');
        }
        // Get parameters
        $letterId = $params['id'];
        $user = User::getConnectedUser();
        $userId = $user->getId();
        // Get all letter style
        $letterStyleModel = new LetterStyleModel();
        $letterStyleList = $letterStyleModel->findAllLetterStyle();
        // Get all letter animation
        $letterAnimationModel = new LetterAnimationModel();
        $letterAnimationList = $letterAnimationModel->findAllLetterAnimation();
        // Get letter
        $letterModel = new LetterModel();
        $letter = $letterModel->findLetter($letterId);

        if ($userId === $letter->getUserId()) {
            // Set data and return viewLetter view
            $this->templateName = 'letter/viewLetter';
            $this->data['letterStyleList'] = $letterStyleList;
            $this->data['letterAnimationList'] = $letterAnimationList;
            $this->data['letter'] = $letter;
            $this->show($this->templateName, $this->data);
        }
        // Send error
        $this->sendHttpError(401, "Motiv'Online - erreur 401");
    }

    public function shareLetter(array $params)
    {
        // Get parameters
        $letterHash = $params['hash'];
        // Get letter
        $letterModel = new LetterModel();
        $letterModel->setLink($letterHash);
        $letter = $letterModel->findLetterByLink();
        // Set data and return viewLetter view
        $this->templateName = 'letter/shareLetter';
        $this->data['letter'] = $letter;
        $this->show($this->templateName, $this->data);
    }

    public function createLetter()
    {
        if (!User::isConnected()) {
            $this->redirect('main_home');
        }
        $errorList = [];
        // Check and set parameters
        if (!empty($_POST)) {
            $name = (isset($_POST['name'])) ? $_POST['name'] : '';
            $companyName = (isset($_POST['companyName'])) ? $_POST['companyName'] : '';
            $link = uniqid();
            $user = User::getConnectedUser();
            $userId = $user->getId();

            // Create company
            $companyModel = new CompanyModel();
            $companyModel->setUserId($userId);
            $companyModel->setName($companyName);
            $result = $companyModel->insert();
            if ($result) {
                $companyId = $companyModel->getId();
                // Set letter and insert it in database
                $letterModel = new LetterModel();
                $letterModel->setName($name);
                $letterModel->setLink($link);
                $letterModel->setUserId($userId);
                $letterModel->setCompanyId($companyId);
                $letterResult = $letterModel->insert();
                if ($letterResult) {
                    // Redirect to letter
                    $parameter = [
                        'id' => $letterModel->getId(),
                    ];
                    $this->redirect('letter_view', $parameter);
                } else {
                    $errorList[] = 'Une erreur inattendue s\'est produite';
                }
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
            $this->redirect('main_home');
        }
        $errorList = [];
        $section = $params['section'];
        $letterId = $params['id'];
        $user = User::getConnectedUser();
        $userId = $user->getId();
        if (!empty($_POST)) {
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
                    $letterModel->setUserId($userId);
                    $result = $letterModel->updateHeader($letterId);
                    break;
                case 'section1':
                    // Set parameters
                    $title = (isset($_POST['title'])) ? $_POST['title'] : '';
                    $content = (isset($_POST['content'])) ? $_POST['content'] : '';
                    // Set letter and update it in database
                    $letterModel = new LetterModel();
                    $letterModel->setTitleSection1($title);
                    $letterModel->setContentSection1($content);
                    $letterModel->setUserId($userId);
                    $result = $letterModel->updateSection1($letterId);
                    break;
                case 'section2':
                    // Set parameters
                    $title = (isset($_POST['title'])) ? $_POST['title'] : '';
                    $content = (isset($_POST['content'])) ? $_POST['content'] : '';
                    // Set letter and update it in database
                    $letterModel = new LetterModel();
                    $letterModel->setTitleSection2($title);
                    $letterModel->setContentSection2($content);
                    $letterModel->setUserId($userId);
                    $result = $letterModel->updateSection2($letterId);
                    break;
                case 'section3':
                    // Set parameters
                    $title = (isset($_POST['title'])) ? $_POST['title'] : '';
                    $content = (isset($_POST['content'])) ? $_POST['content'] : '';
                    $conclusion = (isset($_POST['conclusion'])) ? $_POST['conclusion'] : '';
                    // Set letter and update it in database
                    $letterModel = new LetterModel();
                    $letterModel->setTitleSection3($title);
                    $letterModel->setContentSection3($content);
                    $letterModel->setConclusion($conclusion);
                    $letterModel->setUserId($userId);
                    $result = $letterModel->updateSection3($letterId);
                    break;
                case 'style':
                    // Set parameters
                    $styleId = (isset($_POST['styleId'])) ? $_POST['styleId'] : '';
                    $animationId = (isset($_POST['animationId'])) ? $_POST['animationId'] : '';
                    $name = (isset($_POST['name'])) ? $_POST['name'] : '';
                    // Set letter and update it in database
                    $letterModel = new LetterModel();
                    $letterModel->setLetterStyleId($styleId);
                    $letterModel->setLetterAnimationId($animationId);
                    $letterModel->setName($name);
                    $letterModel->setUserId($userId);
                    $result = $letterModel->updateStyle($letterId);
                    break;
                default:
                    // Send error
                    $this->sendHttpError(404, "Motiv'Online - erreur 404");
            }
            // Redirect to letter
            $parameter = [
                'id' => $letterId,
            ];
            $this->redirect('letter_view', $parameter);
        }
        // Get letter data
        $letterModel = new LetterModel();
        $letterModel->setUserId($userId);
        $letter = $letterModel->findLetter($letterId);
        // Set data and return view section
        $this->templateName = 'letter/' . $section;
        $this->data['letter'] = $letter;
        $this->show($this->templateName, $this->data);
    }

    public function deleteLetter(array $params)
    {
        if (!User::isConnected()) {
            $this->redirect('main_home');
        }
        // Get parmaeters
        $letterId = $params['id'];
        $user = User::getConnectedUser();
        $userId = $user->getId();
        // Set letter and delete it in database
        $letterModel = new LetterModel();
        $letterModel->setUserId($userId);
        $result = $letterModel->delete($letterId);
        
        $this->redirect('letter_list');
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
