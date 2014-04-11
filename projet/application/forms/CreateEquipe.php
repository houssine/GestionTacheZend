<?php

class Application_Form_CreateEquipe extends Zend_Form
{

    public function init()
    {
       
        $this->setMethod('POST');
        $this -> setAction('http://localhost:8081/projet/public/WelcomChe/index'); 
        $this->addElement('text','Id',array(
                'label' =>'IdEquipe',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        $this->addElement('text','NomEquipe',array(
                'label' =>'Nom de l\'équipe',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			  $this->addElement('text','NomCp',array(
                'label' =>'Chef de projet',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			  $this->addElement('text','NomProjet',array(
                'label' =>'Nom de projet',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
			  $this->addElement('text','Effectif',array(
                'label' =>'L\'effectif de l\'équipe',
                'required' => 'true',
                'Filter' =>array('StringTrim')
        	));
        $this->addElement('submit','valider');
        

       /* $name = new Zend_Form_Element_Text('Id');
        $name ->setlabel('Id')
              ->addFilter('StripTags')
              ->setrequired(true);

        $password = new Zend_Form_Element_Password('Password');
        $password ->setlabel('Password')
                  ->addFilter('StripTags')
                  ->setrequired(true);    

        $submit = new Zend_Form_Element_Submit('valider');
        $submit ->setlabel('Valider');
                 

        $this -> addElements(array($name,$password,$submit));
        */
    }


}

