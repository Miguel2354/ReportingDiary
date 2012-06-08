<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	function _initView()
	{
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
		
	}
	
	public function run()
	{
		//$this->setupDatabase();	
		//Set layout for all pages	
		Zend_Layout::startMvc(array('layoutPath' => APPLICATION_PATH . '/views/layouts'));
		
		parent::run();
	}

	public function setupDatabase()
	{
		// load configuration
		/**
		 * Loading configuration from ini file
		 */
		// load configuration
		Zend_Registry::set('configSection', 'production');
		$config = new Zend_Config_Ini(ROOT_DIR . '/../application/configs/application.ini',
				'production');
		Zend_Registry::set('config', $config);
		
		//$iniPath = ROOT_DIR . '/../application/configs/application.ini';
		/*$configuration = new Zend_Config_Ini(
				$iniPath,
				'production'
		);*/
		
		/**
		 * Creating the database handler from the loaded ini file
		 */
		//$dbAdapter = Zend_Db::factory($configuration->database);
		/**
		 * Lets define the newly created handler as our default database handler
		*/
		//Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
		
		/**
		 * Lets add the configurations and the database handler to Registry
		 * to use in future
		 */
		//$registry = Zend_Registry::getInstance();
		//$registry->configuration = $configuration;
		//$registry->dbAdapter     = $dbAdapter;
		/**
		 * Now that we have the values on the Registry, lets cleanuo the variables
		 * from the script scope
		 */
		//unset($dbAdapter, $registry, $configuration);
	}
		
}

