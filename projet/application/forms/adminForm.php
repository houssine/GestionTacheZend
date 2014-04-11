<?php

class Application_Form_adminForm extends Zend_Form
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
        		 $this -> setAction('http://localhost/projet/public/admin/principal'); // actioooooooooooon

$this->addElement('text','id_projet',array(
                'label' =>'Projet : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));


			$this->addElement('text','nom_projet',array(
                'label' =>'Nom du Projet : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			

        		
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');
                 

        	}
        }
    
?>