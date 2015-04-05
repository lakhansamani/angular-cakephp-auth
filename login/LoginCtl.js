var app=angular.module('auth-app.controllers');
app.controller('LoginCtl',function($scope){
	$scope.login=function(){
		var data=$scope.user;
		if(data.username === "admin@gmail.com" && data.password === "1234"){
			$scope.success=true;
			$scope.success_msg="Authenticated Successfully";
		}
		else{
			$scope.err=true;
			$scope.err_msg="Sorry invalid username or password";
		}
	}
});