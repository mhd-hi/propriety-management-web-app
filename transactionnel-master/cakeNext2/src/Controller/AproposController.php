<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Mailer;

class AproposController extends AppController{

    public function index(){
        $this->Authorization->skipAuthorization();

    }
}
?>

