'use strict';
App.controller("profileController", function($scope, dataService) {
	dataService.postData(function(dataResponse) {
        $scope.data = dataResponse;
		});
});
