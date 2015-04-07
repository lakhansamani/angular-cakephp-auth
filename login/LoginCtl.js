var app=angular.module('auth-app.controllers');
app.controller('LoginCtl',function($scope,API_URL,$http){
	$scope.login=function(){
		var user_data=$scope.user;
		$http.post(API_URL+'/users/login',user_data).
		success(function(data,status,headers,config){
			if(data.status=="success"){
				$scope.success=true;
				$scope.success_msg=data.message;
			}
			else{
				$scope.err=true;
				$scope.err_msg=data.message;
			}
		}).
		error(function(){
			$scope.err=true;
			$scope.err_msg="sorry app couldnt connect to api";
		});
	}
});