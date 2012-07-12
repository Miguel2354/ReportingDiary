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
		$sql = 'SELECT lpr_status as Status, COUNT(*) as Amount FROM load_preparation where lpr_lds_fk = 86 GROUP BY lpr_status;';
	
		return DatabaseAccess::getResult($sql);
	}
	
	public function getExecutionStatusCounts()
	{
		$sql = 'SELECT lex_status as Status, COUNT(*) as Amount FROM load_execution where lex_lds_fk = 85 GROUP BY lex_status;';
	
		return DatabaseAccess::getResult($sql);
	}
	
	public function getIssueStatusCounts()
	{
		$sql = 'SELECT ldf_status as Status, COUNT(*) as Amount FROM load_defect where ldf_lds_fk = 87 GROUP BY ldf_status;';
	
		return DatabaseAccess::getResult($sql);
	}
}
