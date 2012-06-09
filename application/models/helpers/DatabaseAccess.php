<?php
/**
 *
 * @author mi4o
 * @version 
 */
require_once 'Zend/Loader/PluginLoader.php';
require_once 'Zend/Controller/Action/Helper/Abstract.php';

/**
 * DatabaseAccess Action Helper
 *
 * @uses actionHelper Zend_Controller_Action_Helper
 */
class DatabaseAccess {
	
	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
	}
	
	public function getResult($sql) {
		try {
			
			$db = Zend_Registry::get('dbAdapter');
			$db->getConnection();
			
			$result = $db->query($sql);
				
			$db->closeConnection();
			
			return $result->fetchAll();
			
		} catch (Exception $e) {
			ErrorController::throwError($e->getMessage());
		}
	}
	
}
