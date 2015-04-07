<?php
	class ResponseObject{
		var $status = "";
		var $data = array();
		var $message = "";
	}  // ResponseObject

	class ErrorResponseObject{
		var $status = "error";
		var $data = -1;
		var $message = "Sorry an unexpected error occurred.";
	}  // ErrorResponseObject

	class ErrorSessionFailed{
		var $status = "error";
		var $data = 3;
		var $message = "Sorry an unexpected error occurred. please login again.";
	}  // ErrorResponseObject
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

			$response_data = new ResponseObject();
			if($this->request->is('post')){
				$request_data=$this->request->input('json_decode',true);
				$user=$this->User->find('first',array('conditions'=>array('email'=>$request_data['email'])));
				if(sizeof($user)>0){
					//check valid password
					if($user['User']['password']==$request_data['password']){
						// generate session code
						$response_data->status='success';
						$response_data->message='logged in';
						//$request_data->data='sdfasdfas';
					}
					else{
						$response_data->status='error';
						$response_data->message='invalid password';
					}
				}	
				else{
					$response_data->status='error';
					$response_data->message='no such user found';
					//user not found
				}
			}
			else{
				$return_data = new ErrorResponseObject();
			}
			$this->response->body(json_encode($response_data));
			return $this->response;
		}
	}
?>