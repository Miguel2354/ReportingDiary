<?php

//include APPLICATION_PATH . '/models/Preparation.php';

class PreparationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$preparation = new Preparation();
    	$this->view->preparation = $preparation->getPreparationList();
    }
    
    public function statuschartAction()
    {
    	$preparation = new Preparation();
    	$this->view->preparation = $preparation->getPreparationStatusCounts();
    }

}

