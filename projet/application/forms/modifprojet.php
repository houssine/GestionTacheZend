<?php

class Application_Form_Modifprojet extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    public function __Construct($option = null){
        		parent :: __construct($option);

    	$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/chefprojet/modifprojet'); // actioooooooooooon
                

                
		
  			$this->addElement('text','nom_projet',array(
              'label' =>'Nom du projet : ',
               'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','duree_projet',array(
               'label' =>'duree_projet: ',
               'required' => 'true',
              'Filter' =>array('StringTrim')
        	));
			     
	
			$this->addElement('text','technologies_utilisees',array(
                'label' =>'Technologies utilisees :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			
        	$this->addElement('text','type_projet',array(
                'label' =>'type_projet :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        	

			$this->addElement('text','budget',array(
                'label' =>'Budget :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));

            $this->addElement('text','etat',array(
                'label' =>'Etat :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));

        	
				  $this->addElement('submit','Modifier');
        		  $this->addElement('reset','annuler');
                 

}


}

