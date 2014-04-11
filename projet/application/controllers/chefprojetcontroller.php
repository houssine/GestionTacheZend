<?php

class ChefprojetController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function cpAction()
    {
        // action body
    }

     public function menuAction()
    {
     
    }
    public function accueilAction()
    {
       
     $form = new Application_Form_Accueil();
     $this ->view->form = $form;
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
///////////////////////////////////////////////// PROJET //////////////////////////////
     public function gestionprojetAction()
    {
       
     $form = new Application_Form_Gestionprojet();
     $this ->view->form = $form;
    }

   public function profilcpAction()
    {
   

     Zend_Session::start();
      $defaultNamespace = new Zend_Session_Namespace('chef'); 
      
     $form = new Application_Form_Profil();
     $this ->view->form = $form;

    }


    public function listerprojetAction()
    {
/*id_cp= 'c11';

    Zend_Session::start();
    $session_lister = new Zend_Session_Namespace('lister'); 
    $session_lister->id=$id_cp;

     /*$form = new Application_Form_Listerprojet();
     $this ->view->form = $form;

   
     $db=$this->Db();
     //$stmt = $db->query('SELECT * FROM projet where id_cp =".$id_cp"');
 $stmt = $db->query('SELECT id_projet FROM projet ');
     while ($row = $stmt->fetch()) {
  
     }*/

    }

 public function supmembreAction()
 {
     $id_equip = new Zend_Session_Namespace('id_equipe');
     //echo $id_equip->id;
     $form = new Application_Form_Supmembre();
     $this ->view->form = $form;
     if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
     $nom_collaborateur=$this->_request->getParam('nom_collaborateur');
    $prenom_collaborateur=$this->_request->getParam('prenom_collaborateur');
    $db=$this->Db();
    $nom_collab = new Zend_Session_Namespace('nom_collaborateur');
    $nom_collab->id=$nom_collaborateur;

     $prenom_collab = new Zend_Session_Namespace('prenom_collaborateur');
    $prenom_collab->id=$prenom_collaborateur;
   
    $select="SELECT nom_collaborateur,prenom_collaborateur FROM collaborateur WHERE nom_collaborateur='".$nom_collaborateur."'and prenom_collaborateur='".$prenom_collaborateur."'";
    $result = $db->fetchAll($select);

    
    
    
     if( count($result)==0)
     {
      if(isset($nom_collaborateur))
 echo "ce collaborateur n'existe pas";
  
   }
     else
      {
        //echo $id_equip->id;
        try{
    $select="SELECT nom_collaborateur, prenom_collaborateur FROM collaborateur WHERE nom_collaborateur =  '".$nom_collaborateur."' and prenom_collaborateur =  '".$prenom_collaborateur."' and id_equipe ='".$id_equip->id."'";
     $result = $db->fetchAll($select);
   }
  catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
   // echo $duree_projet.' '.$nom_projet;
    
    }
       if( count($result)==0)
         {
           echo "Ce collaborateur n'appartient pas a cette equipe !";
        }
     else
         {
   //Zend_Session::start();
          //$id_collab = new Zend_Session_Namespace('id_collaborateur');
          //echo 'id_collab  :'.$id_collab->id;
       


//echo $id_collab->id;
 //   echo $id_collab;
  // $id_tache_session->id=$id_tache;
        $id_collab = new Zend_Session_Namespace('id_collaborateur');
       //echo $id_collab->id;

//$db=$this->Db(); 
 $data = array('id_equipe' =>null);
 try{
$db->update('collaborateur', $data,"id_collaborateur ='" .$id_collab->id."'");
       // $this -> _redirect('chefprojet/supmembre');
}
catch(Zend_Exception $e)
{
echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";

}
//$this->_redirect('chefprojet/supmembre');
//echo 'id_equipe  :'.$id_equip->id;
//echo 'id_collab  :'.$id_collab->id;
  //echo "vous pouvez l'ajouter a votre equipe'";
  //$select="SELECT nom_collaborateur, prenom_collaborateur FROM  `collaborateur` WHERE nom_collaborateur =  '".$nom_collaborateur."' AND prenom_collaborateur =  '".$prenom_collaborateur."' AND id_equipe IS NULL ";
  //  $result = $db->fetchAll($select);
 


}}}
}


 
 





public function ajoutmembreAction()
{
  $this->view->baseUrl = $this->_request->getBaseUrl();
$id_equip = new Zend_Session_Namespace('id_equipe');


$form = new Application_Form_Ajoutmembre();
     $this ->view->form = $form;
     if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
     
     $nom_collaborateur=$this->_request->getParam('nom_collaborateur');
$prenom_collaborateur=$this->_request->getParam('prenom_collaborateur');
//echo $nom_collaborateur.' '.$prenom_collaborateur;
 $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT nom_collaborateur,prenom_collaborateur FROM `collaborateur` WHERE nom_collaborateur='".$nom_collaborateur."'and prenom_collaborateur='".$prenom_collaborateur."'";
    $result = $db->fetchAll($select);
 
 if( count($result)==0){
  if(isset($nom_collaborateur))
echo "ce collaborateur n'existe pas ";
}

  else
{
  if(isset($nom_collaborateur))
  {
$select="SELECT nom_collaborateur, prenom_collaborateur FROM  `collaborateur` WHERE nom_collaborateur =  '".$nom_collaborateur."' AND prenom_collaborateur =  '".$prenom_collaborateur."' AND id_equipe IS NULL ";
    $result = $db->fetchAll($select);
 
 if( count($result)==0){
   if(isset($nom_collaborateur))
echo "ce collaborateur appartient a une autre equipe";
}
else
{
   $nom_collaborateur=$this->_request->getParam('nom_collaborateur');
    $prenom_collaborateur=$this->_request->getParam('prenom_collaborateur');
 $nom_collab= new Zend_Session_Namespace('nom_collaborateur'); 
 $nom_collab->id=$nom_collaborateur;
  $prenom_collab = new Zend_Session_Namespace('prenom_collaborateur');
$prenom_collab->id=$prenom_collaborateur;
Zend_Session::start();
$id_collab = new Zend_Session_Namespace('id_collaborateur');

//echo $id_collab->id;
 //   echo $id_collab;
   //$id_tache_session->id=$id_tache;
  $db=$this->Db();
 
 $data = array('id_equipe' => $id_equip->id);
 try{
$db->update('collaborateur', $data,"id_collaborateur ='" . $id_collab->id."'");
        //$this -> _redirect('admin/modifProjet');
}
catch(Zend_Exception $e)
{


}
//echo 'id_equipe  :'.$id_equip->id;
//echo 'id_collab  :'.$id_collab->id;
  //echo "vous pouvez l'ajouter a votre equipe'";
  //$select="SELECT nom_collaborateur, prenom_collaborateur FROM  `collaborateur` WHERE nom_collaborateur =  '".$nom_collaborateur."' AND prenom_collaborateur =  '".$prenom_collaborateur."' AND id_equipe IS NULL ";
  //  $result = $db->fetchAll($select);
 


}}
}



}
}

public function listercollabAction()
{
    Zend_Session::start();
   $id_equip = new Zend_Session_Namespace('id_equipe');
   //echo 'iddd :'.$id_equip->id;
}





    public function modifprojetAction()
    {
       
     $form = new Application_Form_Modifprojet();
     $this ->view->form = $form;
     if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
     Zend_Session::start();

$id_chef = new Zend_Session_Namespace('chef'); 
//echo 'id:'.$id_chef ->id;
     $id_compte = $id_chef ->id;
     $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
//$select="SELECT id_cp FROM `chef_projet` WHERE id_compte =  '".$id_compte."'";
   // $result = $db->query($select);
/*while($Data = mysql_fetch_array($result))
    {
 echo 'bien';
//echo 'id_cp:'.$r[0];
}*/
 /*$select = new Zend_Db_Select($db);
$select->from(array('c'=>'chef_projet'),array('id_cp'))
        ->where('id_compte =?',$id_compte);
$stmt = $db->query($select);
while($result = $stmt->fetchAll())
  echo $result;
*/
  define('HOST','localhost');
define('login','root');
define('pass','');
define('bdd','gestionprojet');
mysql_connect(HOST,login,pass)or die('erreur de connexion');
mysql_select_db(bdd);
$sql="SELECT id_cp,id_projet FROM `chef_projet` WHERE id_compte='".$id_compte."'";
$req=mysql_query($sql)or die(mysql_error());
$resultat = mysql_fetch_row($req);
$id_cp=$resultat[0];
$id_projet=$resultat[1];
$id_projet_session = new Zend_Session_Namespace('projet'); 
//echo 'id:'.$id_chef ->id;
      $id_projet_session->id=$id_projet;
//echo $id_cp.' '.$id_projet;

  
        //$id_projet= $defaultNamespace->id_proje$nom_projet=$this->_request->getParam('nom_projet');
$duree_projet=$this->_request->getParam('duree_projet');
$nom_projet=$this->_request->getParam('nom_projet');
$technologie=$this->_request->getParam('technologie_utilisees');
$type_projet=$this->_request->getParam('type_projet');
$budget=$this->_request->getParam('budget');
$etat=$this->_request->getParam('etat');
  $db=$this->Db();

 // $req="insert into projet(id_projet)values('test')";
 $data = array(
    //'id_equipe'=>$id_equipe,
   // 'id_projet'=>'ddd',
    
    'nom_projet'=>$nom_projet,
    'duree_projet'=>$duree_projet,
    'technologie_utilisees'=>$technologie,
    'type_projet'=>$type_projet,
    'budget'=>$budget,
    'etat'=>$etat
     );
//$data = array('id_projet' => $id_projet);
 try{
$db->update('projet', $data,"id_projet = '" . $id_projet."'");

       //$nom_cp = var_dump($form->getValue('nom_cp'));
//$id_equipe=$this->_request->getParam('id_equipe');
}
catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
   // echo $duree_projet.' '.$nom_projet;
    
    }
    
    }

}

 public function ajouttacheAction()
    {
      
       Zend_Session::start();
       $id_projet_session = new Zend_Session_Namespace('projet'); 
//echo $id_projet_session->id;
         $form = new Application_Form_Ajouttache();
         $this ->view->form = $form;
if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {

    $id_tache=$this->_request->getParam('id_tache');
    $description_tache=$this->_request->getParam('description_tache');
    $duree_tache=$this->_request->getParam('duree_tache');
    $id_tache_session = new Zend_Session_Namespace('tache'); 
    $id_tache_session->id=$id_tache;
  $db=$this->Db();
 
 $data = array('id_tache' => $id_tache,
               'id_projet' =>$id_projet_session->id ,   // session !!!!
               'description_tache' => $description_tache,
               'duree_tache' => $duree_tache,
    );
 try{
$db->insert('tache', $data);
        //$this -> _redirect('admin/modifProjet');
}
catch(Zend_Exception $e)
{


}

    }
  }

public function listertacheAction(){
  Zend_Session::start();
       $id_projet_session = new Zend_Session_Namespace('projet'); 
}


    public function updatetacheAction()
{
  Zend_Session::start();
    $session_modiftache = new Zend_Session_Namespace('modiftache'); 

   // echo $session_modiftache->id;
      

  //echo $id_tache_session->id;
 $form = new Application_Form_Updatetache();
       $this ->view->form = $form;
     
      
   $description_tache=$this->_request->getParam('description_tache');
   $duree_tache=$this->_request->getParam('duree_tache');
  $db=$this->Db();

 // $req="insert into projet(id_projet)values('test')";
    $data = array(
               'description_tache' => $description_tache,
               'duree_tache' => $duree_tache,
     );
//$data = array('id_projet' => $id_projet);
 try{
  if(isset($description_tache) )
    //echo 'non vide';
$db-> update('tache', $data,"description_tache= '" . $session_modiftache->id."'");
//$sql = $a->__toString();
//echo "$a\n";

       //$nom_cp = var_dump($form->getValue('nom_cp'));
//$id_equipe=$this->_request->getParam('id_equipe');
}
catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
   // echo $duree_projet.' '.$nom_projet;
    
    }
   // echo $defaultNamespace->id;
   
   }
   public function suptacheAction()
    {
         $form = new Application_Form_suptache();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
    $description_tache= $this->_request->getParam('description_tache');
       $db=$this->Db();
       //echo $description_tache;
$select="SELECT description_tache FROM tache WHERE description_tache =  '".$description_tache."'";
//$select="SELECT id_projet FROM `projet` WHERE id_projet =  '".$id_projet."'";
    $result = $db->fetchAll($select);
 
 if( count($result)==0){
  if(isset($description_tache))
  
echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
       
     
    }
    else
   
//$data = array('id_projet' => $id_projet);
 try{
  if(isset($description_tache))
$db->delete('tache',"description_tache = '" . $description_tache."'");

       //$nom_cp = var_dump($form->getValue('nom_cp'));
//$id_equipe=$this->_request->getParam('id_equipe');
}
catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
   // echo $duree_projet.' '.$nom_projet;
    
    }
    
    

}
}



 public function modiftacheAction()
    {
        
        
      $form = new Application_Form_Modiftache();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
       $description_tache= $this->_request->getParam('description_tache');
       $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT description_tache FROM tache WHERE description_tache =  '".$description_tache."'";
    $result = $db->fetchAll($select);
 
 if( count($result)==0){
  if(isset($description_tache) )
echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
       
     
    }
    else
    {
        //echo $id_projet;
       
        $session_modiftache = new Zend_Session_Namespace('modiftache'); 
        $session_modiftache->id=$description_tache;
        //echo $session_modiftache->id;
        $this -> _redirect('chefprojet/updatetache');

//echo $session_modifier->id;
}
    
}
}
public function validateformAction()
    {
        $this->_helper->viewRenderer->setNoRender();
        //$this->_helper->getHelper('layout')->disableLayout();

        $f = new Application_Form_Modifprojetadmin();
        $f->isValid($this->_getAllParams());
        $json = $f->getMessages();
        header('Content-type: application/json');
        echo Zend_Json::encode($json);
    }



    
}





