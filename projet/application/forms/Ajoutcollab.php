<?php

class Application_Form_Ajoutcollab extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }


     public function __Construct($option = null){
        		parent :: __construct($option);

        		$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/admin/ajoutcollab'); // actioooooooooooon

            $this->addElement('text','id_collaborateur',array(
                'label' =>'Id collaborateur : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','id_compte',array(
                'label' =>'Id du compte  :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','nom_collaborateur',array(
                'label' =>'Nom  : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','prenom_collaborateur',array(
                'label' =>'Prenom : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			
			 
			

        	
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');
                 

        	}
        }

