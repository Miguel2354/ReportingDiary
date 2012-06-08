<?php
	class application_views_helpers_BaseUrl
	{
		public function baseUrl()
		{
			$fc = Zend_Controller_Front::getInstance();
			return $fc->getBaseUrl();
		}
	}
?>