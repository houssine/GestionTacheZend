<?php

class Application_Form_Suppcp extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }


 public function __Construct($option = null){
        		parent :: __construct($option);


        		$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/admin/suppcp'); // actioooooooooooon
                

$this->addElement('text','id_cp',array(
                'label' =>'id chef projet : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			
				  $this->addElement('submit','Supprimer');
				  $this->addElement('reset','Annuler');
        

                 

}

}

