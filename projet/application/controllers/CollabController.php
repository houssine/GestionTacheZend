<?php

class CollabController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
         Zend_Session::start();
      $defaultNamespace = new Zend_Session_Namespace('User'); 
//echo $defaultNamespace ->id;

    }

    public function cbAction()
    {
        // action body
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

    public function menuAction()
    {
    $form = new Application_Form_Menucollab();
     $this ->view->form = $form;
    }

    public function accueilAction()
    {
     $form = new Application_Form_Accueilcollab();
     $this ->view->form = $form;
      Zend_Session::start();
      $defaultNamespace = new Zend_Session_Namespace('User'); 
//echo $defaultNamespace ->id;
      $form = new Application_Form_Matache();
     $this ->view->form = $form;
     
     Zend_Session::start();
     $defaultNamespace = new Zend_Session_Namespace('User'); 
     //echo $defaultNamespace ->id;
        define('HOST','localhost');
define('login','root');
define('pass','');
define('bdd','gestionprojet');
mysql_connect(HOST,login,pass)or die('erreur de connexion');
mysql_select_db(bdd);
     $s="SELECT id_collaborateur from collaborateur,compte 
where collaborateur.id_compte=compte.id_compte and collaborateur.id_compte = '".$defaultNamespace ->id."'";
$r=mysql_query($s)or die(mysql_error());
$tache = mysql_fetch_row($r);
//echo $tache[0];
 $id_collab = new Zend_Session_Namespace('Collab'); 
$id_collab ->id=$tache[0];

$s="SELECT tache.id_tache,description_tache from tache, collaborateur where tache.id_tache = collaborateur.id_tache and id_collaborateur = '".$id_collab ->id."'";
$r=mysql_query($s)or die(mysql_error());
$tache = mysql_fetch_row($r);
 $id_tache = new Zend_Session_Namespace('Collab');
$id_tache->id=$tache[0];

/* if( count($tache)==0)
 echo 'pas de resultat';
else
    echo 'y\'a pas de resultat  ';*/
     $description_tache = new Zend_Session_Namespace('Collab');
$description_tache->id=$tache[1]; 
//echo $description_tache->id;

    }



    public function profilAction()
    {
   

     Zend_Session::start();
      $defaultNamespace = new Zend_Session_Namespace('User'); 

     $form = new Application_Form_Profil();
     $this ->view->form = $form;

    }




    public function consultationAction()
    {
       $form = new Application_Form_Consultation();
     $this ->view->form = $form;

     
    }


     public function pourtacheAction()
    {
     /* Zend_Session::start();
    $session_matache = new Zend_Session_Namespace('matache'); 

 $form = new Application_Form_Pourtache();
$this ->view->form = $form;
     
      
   $description_tache=$this->_request->getParam('description_tache');
   $etat=$this->_request->getParam('etat');
  $db=$this->Db();

 
    $data = array(
               'description_tache' => $description_tache,
               'etat' => $etat.'%',
     );

 try{
  if(isset($description_tache) )
   
$db-> update('tache', $data,"description_tache= '" . $session_matache->id."'");

}
catch(Zend_Exception $e)
{

echo "Récupère exception: " . get_class($e) . "\n";
     echo "Message: " . $e->getMessage() . "\n";
    
    }*/

    }



    public function matacheAction()
    {

 Zend_Session::start();
       $session_profil = new Zend_Session_Namespace('profil'); 

 //$id_collab = new Zend_Session_Namespace('User'); 
//echo 'id :'.$session_profil->id;
$defaultNamespace = new Zend_Session_Namespace('User'); 
   
     define('HOST','localhost');
define('login','root');
define('pass','');
define('bdd','gestionprojet');
mysql_connect(HOST,login,pass)or die('erreur de connexion');
mysql_select_db(bdd);
$s="SELECT tache.id_tache,description_tache from tache, collaborateur where tache.id_tache = collaborateur.id_tache and id_compte = '".$defaultNamespace ->id."'";


$r=mysql_query($s)or die(mysql_error());
$tache = mysql_fetch_row($r);


$description_tache = new Zend_Session_Namespace('User');
   // $description_tache = new Zend_Session_Namespace('desc');
$description_tache=$tache[1]; 
//echo 'des : '.$description_tache;
?>
<table>
    <tr><td>Description tache :</td> <td><input name="description_tache" type="text" required id="description_tache" value="<?php echo $description_tache;?>" size="25" readonly></td></tr>
   </table>
<?php

 $form = new Application_Form_Matache();
$this ->view->form = $form;
 
if ($this->getRequest()->isPost()&& $this->view->form->isValid($this->_getAllParams()))
        {
     $id_tache = new Zend_Session_Namespace('User'); 
    
     $etat= $this ->_request->getParam('etat');

     $db=$this->Db(); 
     $data = array(
    
    'etat'=>$etat.'%'
     );
//$data = array('id_projet' => $id_projet);
 try{
$a=$db->update('tache', $data,"description_tache= '" . $description_tache."'");

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
      













