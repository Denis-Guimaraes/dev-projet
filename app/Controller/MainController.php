<?php
namespace MotivOnline\Controller;

use MotivOnline\Util\User;

class MainController extends CoreController
{
    public function home()
    {
        if (User::isConnected()) {
            $this->redirect('letter_list');
        }
        $this->show('main/home');
    }
}
