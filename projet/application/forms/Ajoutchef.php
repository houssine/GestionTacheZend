<?php

class Application_Form_Ajoutchef extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }



    public function __Construct($option = null){
        		parent :: __construct($option);

        		$this -> setMethod('POST');
                 $this -> setAction('http://localhost/projet/public/admin/ajoutchef'); // actioooooooooooon

            $this->addElement('text','id_cp',array(
                'label' =>'Id chef projet : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
            $this->addElement('text','id_compte',array(
                'label' =>'Id du compte  :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
            $this->addElement('text','nom_cp',array(
                'label' =>'Nom  : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
            $this->addElement('text','prenom_cp',array(
                'label' =>'Prenom : ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
            
             
            

            
                  $this->addElement('submit','valider');
                  $this->addElement('reset','annuler');
                 
                 

        	}
        }
    
?>


