<?php
namespace MotivOnline\Controller;

class MainController extends CoreController
{
    public function error(int $errorCode)
    {
      $this->sendHttpError($errorCode, "Motiv'Online - erreur 404");
    }

    public function home()
    {
      $this->show('main/home');
    }
}