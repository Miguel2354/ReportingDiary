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
		$sql = 'SELECT lpr_udf1 as RequirementID, lpr_udf2 as Status, lpr_udf6 as Priority, lpr_udf12 as Product, lpr_udf13 as Country FROM load_preparation';

		return DatabaseAccess::getResult($sql);
	}
	
	public function getPreparationStatusCounts()
	{	
		$sql = 'SELECT lpr_udf2 as Status, COUNT(*) as Amount FROM load_preparation GROUP BY lpr_udf2;';
	
		return DatabaseAccess::getResult($sql);
	}
	
}
