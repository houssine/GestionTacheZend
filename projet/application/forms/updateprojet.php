<?php
 
class Application_Form_updateprojet extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }


    public function __Construct($option = null){
        		parent :: __construct($option);
/*
				$this->setMethod('POST');
        $this->setAttrib('action','authentification');
        $this->addElement('text','Id',array(
                'label' =>'Id',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        $this->addElement('password','password',array(
                'label' =>'Password',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        $this->addElement('submit','valider');
        
*/

        		$this -> setMethod('POST');
        		 $this -> setAction('http://localhost/projet/public/admin/updateprojet'); // actioooooooooooon
                

                //$this->addElement('text','id_projet',array(
                //'label' =>'id de Projet : ',
                //'required' => 'true',
                //'Filter' =>array('StringTrim')
        	//));
			$this->addElement('text','id_cp',array(
              'label' =>'Chef de projet  :',
         'required' => 'true',
            'Filter' =>array('StringTrim')
        	));
  			$this->addElement('text','nom_projet',array(
              'label' =>'Nom du Projet : ',
               'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','duree_projet',array(
               'label' =>'Duree du Projet : ',
               'required' => 'true',
              'Filter' =>array('StringTrim')
        	));
			      $technologie_utilisees = new Zend_Form_Element_Textarea('technologie_utilisees');
             $technologie_utilisees->setLabel('Technologies utilisees :');
                 $technologie_utilisees->setAttrib('cols', 30);
                    $technologie_utilisees ->setAttrib('rows', 5);
                       $technologie_utilisees ->setRequired();
                       $this -> addElement($technologie_utilisees);
	
			$this->addElement('text','type_projet',array(
                'label' =>'Type de projet ',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			$this->addElement('text','budget',array(
                'label' =>'Budget :',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			

        		// $this -> setName('id_cp');
        		// $id_cp = new zend_Form_Element_Text('id_cp');
        		// $id_cp ->setLabel('Id :')
        		       // ->setRequired();

			
        		 // $nom_cp = new zend_Form_Element_Text('nom_cp');
        		 // $nom_cp->setLabel('Nom :');
        		       // $nom_cp ->setRequired();


        		 // $login= new zend_Form_Element_Submit('login');
        		 // $login -> setLabel('LogIn');

        		 // $this -> addElements(array($id_cp , $nom_cp , $login));
				  $this->addElement('submit','valider');
        		  $this->addElement('reset','annuler');
                 

        	}
}
?>
</div>
</body>
    </html>

