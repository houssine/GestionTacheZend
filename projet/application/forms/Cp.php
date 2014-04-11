<?php

class Application_Form_Cp extends Zend_Form
{

    public function init()
    {
       
        $this->setMethod('POST');
        $this -> setAction('authentification/login'); 
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

