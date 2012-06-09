<?php

class BusinesspartnerController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {    	
    	$businesspartner = new Businesspartner();
    	$this->view->businesspartner = $businesspartner->getBusinesspartnerList();
    }


}

