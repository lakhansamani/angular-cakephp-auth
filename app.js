var app = angular.module('auth-app', ['ngRoute','auth-app.controllers']);
app.config(function($routeProvider){
  $routeProvider.when("/",
    {
      templateUrl: "login/login.html",
      controller: "LoginCtl"
    }
  ).otherwise({redirectTo:'/'});
});
app.constant('API_URL', 'http://localhost/angular-cakephp-auth/cake-php');
angular.module('auth-app.controllers',[]);