<?php
require_once APPLICATION_PATH . '/controllers/ErrorController.php';

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{	
	protected function _initView()
	{
		try {
			
			$rootDir = dirname($_SERVER['SCRIPT_NAME']);
			define('ROOT_DIR', $rootDir);
			
			$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
			$viewRenderer->init();
				
			$view = $viewRenderer->view;
	
			$view->doctype('XHTML1_STRICT');
			$view->headMeta()->setName('Content-Type', 'text/html;charset=utf-8');
			
			//Define global Titles
			$view->headTitle()->append('Diary');
			$view->headTitle()->prepend('Reporting ');
			
			//add stylesheets
			$view->headLink()->appendStylesheet(ROOT_DIR . '/css/bootstrap.css')
				 ->headLink()->appendStylesheet(ROOT_DIR . '/css/quitesimply.css');
			
			//add script libraries
			$view->headScript()->appendFile(ROOT_DIR . '/js/bootstrap.js')
				 ->headScript()->appendFile(ROOT_DIR . '/js/jquery-1.7.2.js')
				 ->headScript()->appendFile(ROOT_DIR . '/js/highcharts.js');
			
		} catch (Exception $e) {
			ErrorController::throwError($e->getMessage());
		}
	}
	
	public function run()
	{
		try {
			
			// write configuration and database adapter to the registry
			$this->setConfigurationInRegistry('production');

			// Set layout for all pages	
			Zend_Layout::startMvc(array('layoutPath' => APPLICATION_PATH . '/views/layouts'));
			
			// register Autoloader -> no need to include modules by hand
			Zend_Loader::registerAutoload();
			
			parent::run();

		} catch (Exception $e) {
			ErrorController::throwError($e->getMessage());
		}
	}

	public function setConfigurationInRegistry($environment)
	{
		try {
			
			/**
			 * Loading configuration from ini file
			 */
			$iniPath = APPLICATION_PATH . '/configs/application.ini';
			$configuration = new Zend_Config_Ini(
				$iniPath,
				$environment
			);
			
			/**
			 * Creating the database handler from the loaded ini file
			 */
			$dbAdapter = Zend_Db::factory($configuration->db);

			/**
			 * Lets define the newly created handler as our default database handler
			*/
			Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
			
			/**
			 * Lets add the configurations and the database handler to Registry
			 * to use in future
			*/
			$registry = Zend_Registry::getInstance();
			$registry->configuration = $configuration;
			$registry->dbAdapter     = $dbAdapter;

			/**
			 * Now that we have the values on the Registry, lets cleanuo the variables
			 * from the script scope
			 */
			unset($configuration, $dbAdapter, $registry);

		} catch (Exception $e) {
			ErrorController::throwError($e->getMessage());
		}
	}	
}

