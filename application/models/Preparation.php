<?php

/**
 * Preparation
 *  
 * @author mi4o
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';
class Preparation extends Zend_Db_Table_Abstract {
	/**
	 * The default table name
	 */
	protected $_name = 'preparation';
	
	public function getPreparationList()
	{
		$db = Zend_Registry::get('dbAdapter');
		$db->getConnection();
	
		$sql = 'SELECT lpr_reqid, lpr_status, lpr_udf8, lpr_udf17 FROM load_preparation';
		$result = $db->query($sql);
			
		$db->closeConnection();
	
		return $result->fetchAll();
	}
	
	public function getPreparationStatusCounts()
	{
		$db = Zend_Registry::get('dbAdapter');
		$db->getConnection();
	
		$sql = 'SELECT lpr_status, COUNT(*) as amount FROM load_preparation GROUP BY lpr_status;';
		$result = $db->query($sql);
			
		$db->closeConnection();
	
		return $result->fetchAll();
	}
	
}
