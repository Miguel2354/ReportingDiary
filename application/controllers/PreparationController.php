<?php

class PreparationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$preparation = new Preparation();
    	$this->view->preparationlist = $preparation->getPreparationList();
    }
    
    public function statusAction()
    {
    	$status = new Preparation();
    	switch($this->_request->getParam('viewSelection'))
    	{
    		case "preparation":
       			$this->view->statuslist = $status->getPreparationStatusCounts();	
       			break;
    		case "issue":
    			$this->view->statuslist = $status->getIssueStatusCounts();
       			break;
    		case "execution":
    			$this->view->statuslist = $status->getExecutionStatusCounts();
       			break;
    	}
    }
        
}

