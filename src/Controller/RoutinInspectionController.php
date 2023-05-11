<?php

namespace App\Controller;
use Cake\Event\Event;
use Cake\Network\Session\DatabaseSession;
use App\Network\Email\Email;
use App\Network\Request\Request;
use App\Network\Response\Response;
use Cake\ORM\TableRegistry;
use Twig\Profiler\Dumper\HtmlDumper;

class RoutinInspectionController extends AppController{

    var $name = 'RoutinInspection';		

	public function beforeFilter($event) {
		parent::beforeFilter($event);
		
								
		    $this->loadComponent('Customfunctions');
			$this->loadComponent('Mastertablecontent');
			$this->loadComponent('Progressbar');
			$this->loadComponent('Communication');
			$this->loadComponent('Flowbuttons');
			$this->viewBuilder()->setLayout('admin_dashboard');
			$this->viewBuilder()->setHelpers(['Form','Html']);

		
	}
			
	public function routineInspectionForCA(){
		
		
	
		if ($this->request->is('post')) {
        //    pr($this->request->getData());die;
			// $htmlEncoded_mobile = htmlentities($this->request->getData('mobile'), ENT_QUOTES);
		}
		
	}
	public function routineInspectionForPP(){
		
		
	
		if ($this->request->is('post')) {
        //    pr($this->request->getData());die;
			// $htmlEncoded_mobile = htmlentities($this->request->getData('mobile'), ENT_QUOTES);
		}
		
	}

	public function routineInspectionForLab(){
		
		
	}
}

