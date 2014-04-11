<?php

class Application_Form_LoginForm extends Zend_Form
{

    public function init()
    {}
       
        	public function __Construct($option = null){
        		parent :: __construct($option);
/*
				$this->setMethod('POST');
        $this->setAttrib('action','authentification');
        $this->addElement('text','Id',array(
                'label' =>'Id',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        $this->addElement('password','password',array(
                'label' =>'Password',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        $this->addElement('submit','valider');
        
*/
        		$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/Authentification/login'); // actioooooooooooon

$this->addElement('text','id_compte',array(
                'label' =>'Compte',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));

        		// $this -> setName('id_cp');
        		// $id_cp = new zend_Form_Element_Text('id_cp');
        		// $id_cp ->setLabel('Id :')
        		       // ->setRequired();

			$this->addElement('password','mdp',array(
                'label' =>'Password',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        		 // $nom_cp = new zend_Form_Element_Text('nom_cp');
        		 // $nom_cp->setLabel('Nom :');
        		       // $nom_cp ->setRequired();


        		 // $login= new zend_Form_Element_Submit('login');
        		 // $login -> setLabel('LogIn');

        		 // $this -> addElements(array($id_cp , $nom_cp , $login));
				  $this->addElement('submit','valider');
        		 

        	}
        }
    




