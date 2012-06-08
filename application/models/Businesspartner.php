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

	public function getPartnerList()
	{
		$db = Zend_Registry::get('db');
		$db->getConnection();
	
		$sql = 'SELECT * FROM partner';
		$result = $db->query($sql);
			
		$db->closeConnection();
	
		return $result->fetchAll();
	}
	
	public function getPartner($id)
	{
		$db = Zend_Registry::get('db');
		$db->getConnection();
	
		$sql = 'SELECT * FROM partner WHERE par_pk = ?';
		$result = $db->query($sql, array($id));
			
		$db->closeConnection();
	
		return $result->fetchAll();
	}
	
	public function savePartner()
	{
	}
	
	public function updatePartner()
	{
	}
	
	public function deletePartner()
	{
	}
}
