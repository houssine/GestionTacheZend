<?php

class Application_Form_Ajouttache extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }


    public function __Construct($option = null){
        		parent :: __construct($option);

        		$this -> setMethod('POST');
                 $this -> setAction('http://localhost/projet/public/chefprojet/ajouttache'); // actioooooooooooon

            $this->addElement('text','id_tache',array(
                'label' =>'Id tache : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
            $this->addElement('text','description_tache',array(
                'label' =>'description  :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
            $this->addElement('text','duree_tache',array(
                'label' =>'Duree : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
            
             
            

            
                  $this->addElement('submit','Ajouter');
                  $this->addElement('reset','annuler');
                 
                 

        	}

}

