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
      // Get user id
      $user = User::getConnectedUser();
      $userId = $user->getId();
      // Get user letter list
      $letterModel = new LetterModel();
      $letterList = $letterModel->findAllLetter($userId);
      // Set data and return letterList view
      $this->templateName = 'letter/letterList';
      $this->data['letterList'] = $letterList;
      $this->show($this->templateName, $this->data);
    }

    public function createLetter()
    {
      $this->show('letter/newLetter');
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