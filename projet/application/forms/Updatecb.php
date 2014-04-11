<?php

class Application_Form_Updatecb extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

public function __Construct($option = null){
        		parent :: __construct($option);

    	$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/admin/updatecb'); // actioooooooooooon
                

                
			$this->addElement('text','id_equipe',array(
              'label' =>'Equipe faisant partie :',
         'required' => 'true',
            'Filter' =>array('StringTrim')
        	));
  			$this->addElement('text','nom_collaborateur',array(
              'label' =>'Nom collaborateur: ',
               'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','prenom_collaborateur',array(
               'label' =>'Prenom du collaborateur: ',
               'required' => 'true',
              'Filter' =>array('StringTrim')
        	));
			     
	
			$this->addElement('text','tel_collaborateur',array(
                'label' =>'tel du collaborateur',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			
        	$this->addElement('text','situation_collaborateur',array(
                'label' =>'Situation :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        	$this->addElement('text','Date_naissance_collaborateur',array(
                'label' =>'Date de naissance :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        	$this->addElement('text','DateEmbauche_collaborateur',array(
                'label' =>'Date d\'embauche :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));

			$this->addElement('text','fonction_collaborateur',array(
                'label' =>'Fonction :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));

        	
				  $this->addElement('submit','Modifier');
        		  $this->addElement('reset','annuler');
                 

}

}

