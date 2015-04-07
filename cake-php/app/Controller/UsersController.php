<?php
	class UsersController extends AppController{

		var $uses=array('User');
		public function beforeFilter(){
			AppController::beforeFilter();
			$this->Auth->allow('login');
			$this->response->header('Access-Control-Allow-Origin','*');
			$this->response->header('Access-Control-Allow-Methods','GET, POST, OPTIONS');
			//$this->response->header('Access-Control-Allow-Headers','X-Requested-With');
			$this->response->header('Access-Control-Allow-Headers','Content-Type, x-xsrf-token, session_id');        
			$this->response->header('Access-Control-Max-Age','172800');
			$this->response->header('Content-Type','application/json');
		}
		public function login(){
			//Add one user initially
			/*$user=array();
			$user['email']="lakhan.m.samani@gmail.com";
			$user['password']="123456";
			$this->User->save($user);*/
		}
	}
?>