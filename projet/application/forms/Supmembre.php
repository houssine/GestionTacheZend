<?php

class Application_Form_Supmembre extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

     public function __Construct($option = null){
        		parent :: __construct($option);


        		$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/chefprojet/supmembre'); // actioooooooooooon

            $this->addElement('text','nom_collaborateur',array(
                'label' =>'Nom du collaborateur : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));

			$this->addElement('text','prenom_collaborateur',array(
                'label' =>'Prenom du collaborateur  :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			

        	
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');
        		}


}

