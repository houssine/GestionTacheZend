<?php

class Application_Form_Pourtache extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

public function __Construct($option = null){
        		parent :: __construct($option);

    	$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/collab/pourtache'); // actioooooooooooon
                

                
			
			$this->addElement('text','description_tache',array(
               'label' =>'Description de la tache : ',
               'required' => 'true',
              'Filter' =>array('StringTrim')
        	));
			     
	
			$this->addElement('text','etat',array(
                'label' =>'Etat de votre tache :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			

        	
				  $this->addElement('submit','Evaluer');
        		  $this->addElement('reset','annuler');
                 

}

}

