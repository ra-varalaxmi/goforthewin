'use strict';
App.config(function($routeProvider) {

  $routeProvider.when('/profile', {
    templateUrl: 'partials/profile.html',
    controller: 'profileController'
  });

  $routeProvider.when('/assessment', {
    templateUrl: 'partials/assessment.html',
    controller: 'assessmentController'
  });
  $routeProvider.when('/content', {
    templateUrl: 'partials/content.html',
    controller: 'contentController'
  });

  
  $routeProvider.otherwise({ redirectTo: '/profile' });

});