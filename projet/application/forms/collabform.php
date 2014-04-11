<?php

class Application_Form_Collabform extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    public function __Construct($option = null){
        		parent :: __construct($option);

				
        		$this -> setMethod('POST');
        		

        	}


}