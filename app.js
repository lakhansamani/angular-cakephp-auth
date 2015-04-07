var app = angular.module('auth-app', ['ngRoute','auth-app.controllers']);
app.config(function($routeProvider){
  $routeProvider.when("/",
    {
      templateUrl: "login/login.html",
      controller: "LoginCtl"
    }
  );
});
angular.module('auth-app.controllers',[]);