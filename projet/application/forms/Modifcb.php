<?php

class Application_Form_Modifcb extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

public function __Construct($option = null){
        		parent :: __construct($option);
$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/admin/modifcb'); // actioooooooooooon
                

$this->addElement('text','id_collaborateur',array(
                'label' =>'id collaborateur : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			
			
			
			
			

        	
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');

}
}

