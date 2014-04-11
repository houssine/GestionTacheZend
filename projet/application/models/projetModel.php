class Application_Model_projet extends Zend_Db_Table_Abstract
{
	
    protected $_name='projet';
  public function obtenirProjet($id)
    {
        //$id = (int)$id;
        $row = $this->fetchAll();
        
        return $row->toArray();
    }
    
}
