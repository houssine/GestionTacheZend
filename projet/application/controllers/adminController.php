<?php

class adminController extends Zend_Controller_Action
{
   

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

     public function gestion1Action()
    {
        // action body
    }
     public function gestion2Action()
    {
        // action body
    }
     public function choixprojetAction()
    {
        // action body
    }
     public function choixchefAction()
    {
        // action body
    }
     public function choixcollabAction()
    {
        // action body
    }

    public function accueilAction()
    {
       
     $form = new Application_Form_Accueil();
     $this ->view->form = $form;
    }

///////////////////////////////////////////////////////  PROJET /////////////////////////////////////////////////////
     public function gestionAction()   
    {
       
     $form = new Application_Form_Gestion();
     $this ->view->form = $form;
    
    }





public function principalAction()
    {
             $form=new Application_Form_adminForm();
              $this -> view ->form =$form;
              if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
              $id_projet= $this->_request->getParam('id_projet');
       //$nom_cp = var_dump($form->getValue('nom_cp'));
//$id_equipe=$this->_request->getParam('id_equipe');
//$id_cp=$this->_request->getParam('id_cp');
$nom_projet=$this->_request->getParam('nom_projet');
//$duree_projet=$this->_request->getParam('duree_projet');
//$technologies_utilisees=$this->_request->getParam('technologies_utilisees');
//$type_projet=$this->_request->getParam('type_projet');
//$budget=$this->_request->getParam('budget');
  $db=$this->Db();
 

  $data = array('id_projet' => $id_projet,
  
    'nom_projet' => $nom_projet
    
    );
 try{
$db->insert('projet', $data);
        //$this -> _redirect('admin/modifProjet');
}
catch(Zend_Exception $e)
{

;
    
    }
  
      

    }
}

public function updateprojetAction()
{
    

   Zend_Session::start();
$session_modifier = new Zend_Session_Namespace('modifier'); 
//echo $session_modifier->id;
//echo $defaultNamespace->id;
 $form = new Application_Form_updateprojet();
       $this ->view->form = $form;
     
        //$id_projet= $defaultNamespace->id_projet;
         $id_equipe=$this->_request->getParam('id_equipe');
$id_cp=$this->_request->getParam('id_cp');
$nom_projet=$this->_request->getParam('nom_projet');
$duree_projet=$this->_request->getParam('duree_projet');
$technologie=$this->_request->getParam('technologie_utilisees');
$type_projet=$this->_request->getParam('type_projet');
$budget=$this->_request->getParam('budget');
  $db=$this->Db();

 // $req="insert into projet(id_projet)values('test')";
 $data = array(
    //'id_equipe'=>$id_equipe,
   // 'id_projet'=>'ddd',
    'id_cp'=>$id_cp,
    'nom_projet'=>$nom_projet,
    'duree_projet'=>$duree_projet,
    'technologie_utilisees'=>$technologie,
    'type_projet'=>$type_projet,
    'budget'=>$budget
     );
//$data = array('id_projet' => $id_projet);
 try{
$db->update('projet', $data,"id_projet = '" . $session_modifier->id."'");

       //$nom_cp = var_dump($form->getValue('nom_cp'));
//$id_equipe=$this->_request->getParam('id_equipe');
}
catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
   // echo $duree_projet.' '.$nom_projet;
    
    }
    //echo 'Votre projet est bien modifiee !';
   // echo $defaultNamespace->id;
   
   }


 public function modifprojetAction()
    {
        
        
      $form = new Application_Form_Modifprojetadmin();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
            
        
       $id_projet= $this->_request->getParam('id_projet');
       $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT id_projet FROM `projet` WHERE id_projet =  '".$id_projet."'";
    $result = $db->fetchAll($select);
 if(isset($id_projet)){
 if( count($result)!=0){
       
        $session_modifier = new Zend_Session_Namespace('modifier'); 
$session_modifier->id=$id_projet;

$this -> _redirect('admin/updateprojet');
}
else
  echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
}

//echo $session_modifier->id;
     
     
  
        //echo $id_projet;
      
    


}
}
public function supprojetAction()
    {
         $form = new Application_Form_supprojet();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
    $id_projet= $this->_request->getParam('id_projet');
       $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT id_projet FROM `projet` WHERE id_projet =  '".$id_projet."'";
    $result = $db->fetchAll($select);
 if(isset($id_projet)){
 if( count($result)!=0){

   
//$data = array('id_projet' => $id_projet);
 try{
$db->delete('projet',"id_projet = '" . $id_projet."'");

       //$nom_cp = var_dump($form->getValue('nom_cp'));
//$id_equipe=$this->_request->getParam('id_equipe');
}
catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
   // echo $duree_projet.' '.$nom_projet;
    
    }
    echo 'Votre projet est supprimee!';
    

}
else
echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
       
     
    }}}
    



public function listprojetAction()
{
   $db=$this->Db();
$stmt = $db->query('SELECT * FROM projet');
 
while ($row = $stmt->fetch()) {
  
}
    


}


//////////////////////////////////////////////////////// CHEF PROJET //////////////////////////////////////////////////
     public function gestionchefAction()
    {
       
     $form = new Application_Form_Gestionchef();
     $this ->view->form = $form;
    }


     public function ajoutchefAction()
    {
       
     $form = new Application_Form_Ajoutchef();
     $this ->view->form = $form;

if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
    $id_cp=$this->_request->getParam('id_cp');
    $id_compte=$this->_request->getParam('id_compte');
    $nom_cp=$this->_request->getParam('nom_cp');
     $prenom_cp=$this->_request->getParam('prenom_cp');
        $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT id_cp FROM `chef_projet` WHERE id_cp=  '".$id_cp."'";
    $result = $db->fetchAll($select);
 
 if( count($result)==0){
    
if(isset($id_cp))
   {    

 
 $data = array('id_cp' => $id_cp,
               'id_compte' => $id_compte,
               'nom_cp' => $nom_cp,
               'prenom_cp' => $prenom_cp,

    );
 try{
$db->insert('chef_projet', $data);
        //$this -> _redirect('admin/modifProjet');
}
catch(Zend_Exception $e)
{
//echo "Récupère exception: " . get_class($e) . "\n";
    // echo "Message: " . $e->getMessage() . "\n";

//echo "verifiez les coordonnees(id du chef et id de son compte(s'il est deja cree sinon veuillez creer un compte avant d'ajouter ce chef))";
}


     
    }}
     else
echo "ce chef existe deja !";

   }
}

public function updatecpAction()
{
    

   Zend_Session::start();
$session_modifier = new Zend_Session_Namespace('modifier'); 
//echo $session_modifier->id;
//echo $defaultNamespace->id;
 $form = new Application_Form_updatecp();
       $this ->view->form = $form;
     
        //$id_projet= $defaultNamespace->id_projet;
         $id_equipe=$this->_request->getParam('id_equipe');
$id_projet=$this->_request->getParam('id_projet');
$nom_cp=$this->_request->getParam('nom_cp');
$prenom_cp=$this->_request->getParam('prenom_cp');
$tel_cp=$this->_request->getParam('tel_cp');
$situation_cp=$this->_request->getParam('situation_cp');
$date_naissance_cp=$this->_request->getParam('date_naissance');
$date_embauche=$this->_request->getParam('date_ambauche');
  $db=$this->Db();

 // $req="insert into projet(id_projet)values('test')";
 $data = array(
    //'id_equipe'=>$id_equipe,
   // 'id_projet'=>'ddd',
    'id_equipe'=>$id_equipe,
    'id_projet'=>$id_projet,
    'nom_cp'=>$nom_cp,
    'prenom_cp'=>$prenom_cp,
    'tel_cp'=>$tel_cp,
    'situation_cp'=>$situation_cp,
    'date_naissance'=>$date_naissance_cp,
    'date_ambauche'=>$date_embauche,
     );
//$data = array('id_projet' => $id_projet);
 try{
$db->update('chef_projet', $data,"id_cp = '" . $session_modifier->id."'");

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


 public function modifcpAction()
    {
        
        
      $form = new Application_Form_Modifcp();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
       $id_cp= $this->_request->getParam('id_cp');
       $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT id_cp FROM `chef_projet` WHERE id_cp =  '".$id_cp."'";
    $result = $db->fetchAll($select);
 if(isset($id_cp))
 {
 if( count($result)!=0){
//echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
       
     
  //  }
  //  else
   // {
        //echo $id_projet;
       
        $session_modifier = new Zend_Session_Namespace('modifier'); 
$session_modifier->id=$id_cp;
$this -> _redirect('admin/updatecp');

//echo $session_modifier->id;
}
else
echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
}
  
    
}

}
public function suppcpAction()
    {
         $form = new Application_Form_Suppcp();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
    $id_cp= $this->_request->getParam('id_cp');
       $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT id_cp FROM `chef_projet` WHERE id_cp =  '".$id_cp."'";
    $result = $db->fetchAll($select);
 
 if(isset($id_cp)){
 if( count($result)!=0){
//echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
       
     
    //}
   // else
   
//$data = array('id_projet' => $id_projet);
 try{
$db->delete('chef_projet',"id_cp = '" . $id_cp."'");

       //$nom_cp = var_dump($form->getValue('nom_cp'));
//$id_equipe=$this->_request->getParam('id_equipe');
}
catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
   // echo $duree_projet.' '.$nom_projet;
    
    }
    echo 'votre chef est bien supprimee!';
}
else
echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
}
}
}
public function listcpAction()
{
   $db=$this->Db();
$stmt = $db->query('SELECT * FROM chef_projet');
 
while ($row = $stmt->fetch()) {
  
}
    


}

///////////////////////////////////////////////////////   COLLABORATEUR   ////////////////////////////////////////////////////
    

     public function gestioncbAction()
    {
       
     $form = new Application_Form_Gestioncb();
     $this ->view->form = $form;
    }



 public function ajoutcollabAction()
    {
       
     $form = new Application_Form_Ajoutcollab();
     $this ->view->form = $form;

if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {

     $id_collaborateur= $this->_request->getParam('id_collaborateur');
      
     $id_compte=$this->_request->getParam('id_ compte');
     $nom_collaborateur=$this->_request->getParam('nom_collaborateur');
     $prenom_collaborateur=$this->_request->getParam('prenom_collaborateur');
     $db=$this->Db();
 
 $data = array('id_collaborateur' => $id_collaborateur);
 try{
$db->insert('collaborateur', $data);
    
}
catch(Zend_Exception $e)
{

// echo "Récupère exception: " . get_class($e) . "\n";
    // echo "Message: " . $e->getMessage() . "\n";
    
    }
  
    }

}

public function updatecbAction()
{
    

   Zend_Session::start();
$session_modifier = new Zend_Session_Namespace('modifier'); 
//echo $session_modifier->id;
//echo $defaultNamespace->id;
 $form = new Application_Form_updatecb();
       $this ->view->form = $form;
     
        //$id_projet= $defaultNamespace->id_projet;
         $id_equipe=$this->_request->getParam('id_equipe');

$nom_collaborateur=$this->_request->getParam('nom_collaborateur');
$prenom_collaborateur=$this->_request->getParam('prenom_collaborateur');
$tel_collaborateur=$this->_request->getParam('tel_collaborateur');
$situation_collaborateur=$this->_request->getParam('situation_collaborateur');
$Date_Naissance=$this->_request->getParam('Date_naissance_collaborateur');
$Date_Embauche=$this->_request->getParam('DateEmbauche_collaborateur');
$fonction_collaborateur=$this->_request->getParam('fonction_collaborateur');
  $db=$this->Db();

 // $req="insert into projet(id_projet)values('test')";
 $data = array(
    //'id_equipe'=>$id_equipe,
   // 'id_projet'=>'ddd',
    'id_equipe'=>$id_equipe,
    'nom_collaborateur'=>$nom_collaborateur,
    'prenom_collaborateur'=>$prenom_collaborateur,
    'tel_collaborateur'=>$tel_collaborateur,
    'situation_collaborateur'=>$situation_collaborateur,
    'Date_naissance_collaborateur'=>$Date_Naissance,
    'DateEmbauche_collaborateur'=>$Date_Embauche,
    'fonction_collaborateur'=>$fonction_collaborateur,
     );
//$data = array('id_projet' => $id_projet);
 try{
$db->update('collaborateur', $data,"id_collaborateur = '" . $session_modifier->id."'");

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


 public function modifcbAction()
    {
         $form = new Application_Form_Modifcb();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
       $id_collaborateur= $this->_request->getParam('id_collaborateur');
       $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT id_collaborateur FROM `collaborateur` WHERE id_collaborateur =  '".$id_collaborateur."'";
    $result = $db->fetchAll($select);
 
 if(isset($id_collaborateur))
 {
 if( count($result)!=0){
//echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
       
     
   // }
   // else
   // {
        //echo $id_projet;
       
        $session_modifier = new Zend_Session_Namespace('modifier'); 
$session_modifier->id=$id_collaborateur;
$this -> _redirect('admin/updatecb');

//echo $session_modifier->id;
}
else
  echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";


    
}

}
}
public function suppcbAction()
    {
         $form = new Application_Form_Suppcb();
       $this ->view->form = $form;
       if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
    $id_collaborateur= $this->_request->getParam('id_collaborateur');
       $db=$this->Db();
// $select="SELECT chef_projet.id_compte FROM compte, chef_projet where compte.id_compte=chef_projet.id_compte and  chef_projet.mail_cp='".$id."'";
$select="SELECT id_collaborateur FROM `collaborateur` WHERE id_collaborateur =  '".$id_collaborateur."'";
    $result = $db->fetchAll($select);
 if(isset($id_collaborateur)){
 if( count($result)!=0){
//echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
       
     
  //  }
  //  else
   
//$data = array('id_projet' => $id_projet);
 try{
$db->delete('collaborateur',"id_collaborateur = '" . $id_collaborateur."'");

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
else
echo "<script>alert('Donnees erronees , veuillez vous assurez de vos coordonees !');</script>";
}
}
}
public function listcbAction()

{
   $db=$this->Db();
$stmt = $db->query('SELECT * FROM collaborateur');
 
while ($row = $stmt->fetch()) {
  
}
    


}


////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    public function menuAction()
    {
     
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





