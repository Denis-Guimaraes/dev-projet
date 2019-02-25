<?php
namespace MotivOnline\Controller;

class LetterController extends CoreController
{
    public function showAllLetter()
    {
      $this->show('letter/letterList');
    }

    public function createLetter()
    {
      $this->show('letter/newLetter');
    }
}