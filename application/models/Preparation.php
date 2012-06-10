<?php

/**
 * Preparation
 *  
 * @author mi4o
 * @version 
 */
include 'helpers/DatabaseAccess.php';
require_once 'Zend/Db/Table/Abstract.php';

class Preparation extends Zend_Db_Table_Abstract {
	/**
	 * The default table name
	 */
	protected $_name = 'preparation';
	
	public function getPreparationList()
	{
		$sql = 'SELECT lpr_reqid, lpr_status, lpr_udf8, lpr_udf17 FROM load_preparation';

		return DatabaseAccess::getResult($sql);
	}
	
	public function getPreparationStatusCounts()
	{	
		$sql = 'SELECT lpr_status as status, COUNT(*) as amount FROM load_preparation GROUP BY lpr_status;';
	
		return DatabaseAccess::getResult($sql);
	}
	
}
