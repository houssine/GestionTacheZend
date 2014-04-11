<?php

class Application_Form_Modifcp extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

 public function __Construct($option = null){
        		parent :: __construct($option);
$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/admin/modifcp'); // actioooooooooooon
                

$this->addElement('text','id_cp',array(
                'label' =>'id chef projet : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			
			
			
			
			

        	
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');

}

}