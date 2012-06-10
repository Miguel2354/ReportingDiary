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
    
    public function statuschartAction()
    {
    	$preparation = new Preparation();
       	$this->view->statuslist = $preparation->getPreparationStatusCounts();
    }

}

