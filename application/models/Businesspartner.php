<?php

/**
 * Businesspartner
 *  
 * @author mi4o
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Businesspartner extends Zend_Db_Table_Abstract {
	/**
	 * The default table name
	 */
	protected $_name = 'businesspartner';

	public function getBusinesspartnerList()
	{
		$db = Zend_Registry::get('dbAdapter');
		$db->getConnection();
	
		$sql = 'SELECT * FROM partner';
		$result = $db->query($sql);
			
		$db->closeConnection();
	
		return $result->fetchAll();
	}
	
	public function getBusinesspartner($id)
	{
		$db = Zend_Registry::get('dbAdapter');
		$db->getConnection();
	
		$sql = 'SELECT * FROM partner WHERE par_pk = ?';
		$result = $db->query($sql, array($id));
			
		$db->closeConnection();
	
		return $result->fetchAll();
	}
	
	public function saveBusinesspartner()
	{
	}
	
	public function updateBusinesspartner()
	{
	}
	
	public function deleteBusinesspartner()
	{
	}
}
