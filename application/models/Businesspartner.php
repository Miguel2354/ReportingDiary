<?php

/**
 * Businesspartner
 *  
 * @author mi4o
 * @version 
 */

include 'helpers/DatabaseAccess.php';
require_once 'Zend/Db/Table/Abstract.php';

class Businesspartner extends Zend_Db_Table_Abstract {
	/**
	 * The default table name
	 */
	protected $_name = 'businesspartner';

	public function getBusinesspartnerList()
	{
		$sql =  'SELECT * FROM partner';
		
		return DatabaseAccess::getResult($sql);
	}
	
	public function getBusinesspartner($id)
	{
		$sql = 'SELECT * FROM partner WHERE par_pk = ?';
		
		return DatabaseAccess::getResult($sql);
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
