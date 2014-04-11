<?php

class Application_Form_Modiftache extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    public function __Construct($option = null){
        		parent :: __construct($option);
$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/chefprojet/modiftache'); // actioooooooooooon
                

$this->addElement('text','description_tache',array(
                'label' =>'Nom de la tache : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			
			
			
			
			

        	
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');

}


}

