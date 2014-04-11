<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      //insertion dabs la base de données
      /* $register = new Application_Model_Register();
       $register -> createCp(array(
                  'id_cp' => 'cp1',
                  'nom_cp' =>'fadoua',
                  'prenom_cp'=>'nakhali'));*/

       $form = new Application_Form_LoginForm;
       $this ->view->form = $form;
    }

    public function validationAction()
    {

      
    }

    public function ccontrollerAction()
    {
        // action body
    }

    public function accueilcollabAction()
    {
        // action body
    }


}



