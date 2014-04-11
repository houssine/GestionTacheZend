<?php

class AuthentificationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }


    public function SeconnecterAction(){

 $form = new Application_Form_LoginForm();
       $authAdapter = $this ->getAuthAdapter();
      //$id_cp = 'fadoua';
$id_compte= $this->_request->getParam('id_compte');
       $nom_cp = var_dump($form->getValue('nom_cp'));
$password=$this->_request->getParam('mdp');
        $authAdapter ->  setIdentity($id_compte)
                     ->  setCredential($password);

        $auth = Zend_Auth :: getInstance();
        $result = $auth -> authenticate($authAdapter);

         if($result -> isValid()){
             $identity = $authAdapter -> getResultRowObject();
             

             $authStorage = $auth -> getStorage();
           $authStorage -> write($identity);
$id=$authStorage->read()->id_compte;
 //           $this -> _redirect('chefprojet/index');
 //          $this -> _redirect('index/index');
            
    
          $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT chef_projet.id_compte FROM compte, chef_projet WHERE compte.id_compte = chef_projet.id_compte AND chef_projet.id_compte =  '".$id."'";
    $result = $db->fetchAll($select);
 
 if( count($result)==0){
 $select="SELECT collaborateur.id_compte FROM compte, collaborateur WHERE compte.id_compte = collaborateur.id_compte AND collaborateur.id_compte =  '".$id."'";

    $result = $db->fetchAll($select);
if( count($result)==0)
{$defaultNamespace = new Zend_Session_Namespace('User'); 
$defaultNamespace ->id=$id;
  $this -> _redirect('admin/index');

}
 //   $this -> _redirect('collab/index');
//echo  'Vous etes un admin' ;
else
{
    $defaultNamespace = new Zend_Session_Namespace('User'); 
$defaultNamespace ->id=$id;

$this -> _redirect('collab/index');
//echo $id;

}
 }
  else
  {



//echo 'vous etes chef';
$id_chef = new Zend_Session_Namespace('chef'); 
$id_chef ->id=$id;
 $this -> _redirect('chefprojet/index');
//echo $defaultNamespace ->id  ;
}
 }
           
         
         else {
            
         $this -> _redirect('index/seconnecter');
                    // $this -> _redirect('index/ahthentif');

             //echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
         }
       

    }

    public function loginAction()
    {
	
       
    $form = new Application_Form_LoginForm();
       $authAdapter = $this ->getAuthAdapter();
      //$id_cp = 'fadoua';
$id_compte= $this->_request->getParam('id_compte');
       $nom_cp = var_dump($form->getValue('nom_cp'));
$password=$this->_request->getParam('mdp');
        $authAdapter ->  setIdentity($id_compte)
                     ->  setCredential($password);

        $auth = Zend_Auth :: getInstance();
        $result = $auth -> authenticate($authAdapter);

         if($result -> isValid()){
             $identity = $authAdapter -> getResultRowObject();
			 

             $authStorage = $auth -> getStorage();
           $authStorage -> write($identity);
$id=$authStorage->read()->id_compte;
 //           $this -> _redirect('chefprojet/index');
 //          $this -> _redirect('index/index');
			
	
		  $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT chef_projet.id_compte FROM compte, chef_projet WHERE compte.id_compte = chef_projet.id_compte AND chef_projet.id_compte =  '".$id."'";
    $result = $db->fetchAll($select);
 
 if( count($result)==0){
 $select="SELECT collaborateur.id_compte FROM compte, collaborateur WHERE compte.id_compte = collaborateur.id_compte AND collaborateur.id_compte =  '".$id."'";

    $result = $db->fetchAll($select);
if( count($result)==0)
{$defaultNamespace = new Zend_Session_Namespace('User'); 
$defaultNamespace ->id=$id;
  $this -> _redirect('admin/index');

}
 //   $this -> _redirect('collab/index');
//echo  'Vous etes un admin' ;
else
{
    $defaultNamespace = new Zend_Session_Namespace('User'); 
$defaultNamespace ->id=$id;

$this -> _redirect('collab/index');
//echo $id;

}
 }
  else
  {



//echo 'vous etes chef';
$id_chef = new Zend_Session_Namespace('chef'); 
$id_chef ->id=$id;
 $this -> _redirect('chefprojet/index');
//echo $defaultNamespace ->id  ;
}
 }
		   
         
         else {
            
         $this -> _redirect('index/index');
                    // $this -> _redirect('index/ahthentif');

             //echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
         }

     

    }

    public function logoutAction()
    {
        Zend_Auth :: getInstance() -> clearIdentity();
        $this -> _redirect('index/index');
    }
    
    private function getAuthAdapter(){

        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table :: getDefaultAdapter());
        $authAdapter -> setTableName('compte')
                     -> setIdentityColumn('id_compte')
                     -> setCredentialColumn('mdp');

        return $authAdapter;
    }
	private function Db()
	{
	require_once 'Zend/Db.php';

$params = array ('host'     => 'localhost',
                 'username' => 'root',
                 'password' => '',
                 'dbname'   => 'gestionprojet');

$db = Zend_Db::factory('PDO_MYSQL', $params);
return $db;

	}
public function testSession()
{
$test=new Zend_Session_Namespace('chef');
$ns->id = $this->_getParam('id', 0);
}

}





