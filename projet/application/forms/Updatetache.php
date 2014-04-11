<?php

class Application_Form_Updatetache extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }


    public function __Construct($option = null){
        		parent :: __construct($option);

    	$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/chefprojet/updatetache'); // actioooooooooooon
                

                
			
			$this->addElement('text','description_tache',array(
               'label' =>'Description de la tache : ',
               'required' => 'true',
              'Filter' =>array('StringTrim')
        	));
			     
	
			$this->addElement('text','duree_tache',array(
                'label' =>'La duree de la tache :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			

        	
				  $this->addElement('submit','modifier');
        		  $this->addElement('reset','annuler');
                 

}


}

