<?php

class Application_Form_Cpform extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    public function __Construct($option = null){
        		parent :: __construct($option);

				
        		$this -> setMethod('POST');
        		// $this -> setAction(Zend_Controller_Front::getInstance() =getBaseUrl().'/chefprojet/index'); // actioooooooooooon

      $this->addElement('text','id_compte',array(
                'label' =>'IdCompte',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));

        		/*$this -> setName('id_compte');
        		$id_cp = new zend_Form_Element_Text('id_compte');
        		 $id_cp ->setLabel('Id :')
        		       ->setRequired();*/

			$this->addElement('password','mdp',array(
                'label' =>'Password',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        		 /* $password = new zend_Form_Element_Text('mdp');
        		  $password->setLabel('Nom :');*/
        		       // $nom_cp ->setRequired();


        		  /*$login= new zend_Form_Element_Submit('login');s
        		 $login -> setLabel('LogIn');s*/

        		 // $this -> addElements(array($id_cp , $nom_cp , $login));
			 $this->addElement('submit','valider');
        		/*$this -> addElements(array($id_compte , $password, $login));*/

        	}


}

