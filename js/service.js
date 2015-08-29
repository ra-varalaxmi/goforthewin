'use strict';

App.service('dataService', function($http) {
/* delete $http.defaults.headers.common['X-Requested-With']; */
this.postData = function(callbackFunc) {
    $http({
        method: 'POST',
        url: 'http://10.16.22.137/goforthewin/experience',
		data: { "tags":"afraid" }
		}).success(function(data){
        // With the data succesfully returned, call our callback
        callbackFunc(data);
    }).error(function(){
        //alert("error");
    });
 }
});