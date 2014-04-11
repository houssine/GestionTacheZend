<?php

class Application_Model_Register
{

public function createProjet($array){

	$dbTableProjet = new Application_Model_DbTable_Projet();
	$dbTableProjet -> insert($array);
}
}

