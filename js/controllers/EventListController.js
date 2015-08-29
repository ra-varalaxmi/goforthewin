'use strict';
App.controller('ExampleController', ['$scope', function($scope) {
	$scope.user={
		Name: 'Hari',
		address: {
		
			street: '1234 Hari Lane',
			city: 'Hari City',
			planet: 'Haris Planet'
		},
		Friends: [
			'Sally',
			'Sam',
			'Silly',
			'Sqrt'
		
		]
	}
    }]);
App.directive('userInfoCard', function(){

return {
		templateUrl: "userinfocard.html",
		restrict: 'E',
		scope: { user:'='},
		controller: function($scope){
	$scope.clickMe = function (user){
		user.rank="me";

		}
$scope.collapse = function(){ $scope.collapsed = !$scope.collapsed;}

		},
		replace: true

}

});