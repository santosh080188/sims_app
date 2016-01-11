// Code goes here
var path = "http://localhost/sims_app/";
var myApp = angular.module('myApp', ['angularUtils.directives.dirPagination']);

function MyController($scope) {
alert("asdfas");
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.meals = [];
  $http({
        method: 'POST',
        url: path+"dashboard/get_user_list",
        data:  $.param({ questionid : id, voteType : type}),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {            
            $scope.meals = response;
            alert($scope.meals);
        })
  
  $scope.pageChangeHandler = function(num) {
      console.log('meals page changed to ' + num);
  };
}

function OtherController($scope) {
  $scope.pageChangeHandler = function(num) {
    console.log('going to page ' + num);
  };
}

myApp.controller('MyController', MyController);
myApp.controller('OtherController', OtherController);