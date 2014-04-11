<?php

class Application_Form_Updatecp extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }
 public function __Construct($option = null){
        		parent :: __construct($option);

    	$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/admin/updatecp'); // actioooooooooooon
                

                
			$this->addElement('text','id_equipe',array(
              'label' =>'Equipe affectee  :',
         'required' => 'true',
            'Filter' =>array('StringTrim')
        	));
  			$this->addElement('text','nom_projet',array(
              'label' =>'Projet affecte : ',
               'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','nom_cp',array(
               'label' =>'Nom chef de projet: ',
               'required' => 'true',
              'Filter' =>array('StringTrim')
        	));
			     
	
			$this->addElement('text','prenom_cp',array(
                'label' =>'prenom chef de projet',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','tel_cp',array(
                'label' =>'telephone :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        	$this->addElement('text','situation_cp',array(
                'label' =>'Situation :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        	$this->addElement('text','date_naissance',array(
                'label' =>'Date de naissance :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        	$this->addElement('text','date_ambauche',array(
                'label' =>'Date d\'embauche :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			

        	
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');
                 

}
}

