<?php

class Application_Form_Matache extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }
     
     public function __Construct($option = null){
      parent :: __construct($option);

      Zend_Session::start();
      $description_tache = new Zend_Session_Namespace('User');




        		
                 $this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/collab/matache'); // actioooooooooooon
                

/*

               $this->addElement('text','description_tache',array(
               'label' =>'Description de la tache : ',
               'required' => 'true',
              'Filter' =>array('StringTrim'),
              'value'=>$description_tache->id,

              'readonly' =>'true'
            ));
                 
    */


            $this->addElement('text','etat',array(
                'label' =>'Etat de votre tache :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
            ));
			
			//echo 'desc : '.$description_tache->id;
			
			

        	
				  $this->addElement('submit','Entree');
        		  $this->addElement('reset','annuler');

}


}

