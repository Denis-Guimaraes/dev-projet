<?php
namespace DevProjet\Controller;

class MainController extends CoreController
{
    public function home()
    {
      $this->show('main/home');
    }
}