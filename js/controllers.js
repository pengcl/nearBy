'use strict';

/* Controllers */

var nearbyControllers = angular.module('nearbyControllers', []);

nearbyControllers.controller('LoginController', function ($scope, $rootScope, AUTH_EVENTS, AuthService) {
    $scope.credentials = {
        username: '',
        password: ''
    };
    $scope.login = function (credentials) {
        AuthService.login(credentials).then(function (user) {
            $rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
            $scope.setCurrentUser(user);
        }, function () {
            $rootScope.$broadcast(AUTH_EVENTS.loginFailed);
        });
    };
    javascript: void(0);
});

nearbyControllers.controller('ApplicationController', function ($scope,
    USER_ROLES,
    AuthService) {
    $scope.currentUser = null;
    $scope.userRoles = USER_ROLES;
    $scope.isAuthorized = AuthService.isAuthorized;
    $scope.setCurrentUser = function (user) {
        alert("1");
        $scope.currentUser = user;
    };
});

nearbyControllers.controller('NearbyLoginCtrl', ['$scope', '$rootScope', 'AUTH_EVENTS', 'AuthService', '$http',
  function ($scope, $rootScope, AUTH_EVENTS, AuthService, $http) {
        $scope.setClass = "sign-in";
        $scope.load = function () {
            bannerInit();
        };
  }]);

nearbyControllers.controller('NearbyRegisterCtrl', ['$scope', '$http',
  function ($scope, $http) {
        /*$http.get('phones/phones.json').success(function (data) {
            $scope.phones = data;
        });*/
  }]);

nearbyControllers.controller('NearbyIndexCtrl', ['$scope', '$http', '$sce',
  function ($scope, $http, $sce) {
        /*$http.get('phones/phones.json').success(function (data) {
            $scope.phones = data;
        });
        $http.get('utils/package.json').success(function (data) {
            $scope.packages = data;
        });
        $http.get('utils/fqa.json').success(function (data) {
            $scope.fqas = data;
            $scope.remarksHtml = $sce.trustAsHtml(data.phone.remarks);
        });
        $http.get('utils/promise.json').success(function (data) {
            $scope.promises = data;
        });*/
  }]);

nearbyControllers.controller('PersonListCtrl', ['$scope', '$http',
  function ($scope, $http) {
        /*$http.get('phones/phones.json').success(function (data) {
            $scope.phones = data;
        });*/
  }]);

nearbyControllers.controller('PersonDetailCtrl', ['$scope', '$routeParams', '$http',
  function ($scope, $routeParams, $http) {
        /*$http.get('phones/phones.json').success(function (data) {
            $scope.phones = data;
        });

        $http.get('phones/' + $routeParams.phoneId + '.json').success(function (data) {
            $scope.phone = data;
            $scope.mainImageUrl = data.images.gold;
            $scope.mainFlashPrice = data.storage.price[0];
        });

        $http.get('utils/package.json').success(function (data) {
            $scope.packages = data;
            $scope.mainTipsIndex = 0;
            $scope.mainTips = "原价" + data[0].oldPrice + "元！" + data[0].tips;
        });

        $scope.setTips = function (index) {
            $scope.mainTipsIndex = index;
            $scope.mainTips = "原价" + $scope.packages[index].oldPrice + "元！" + $scope.packages[index].tips;
        }

        $scope.setImage = function (imageUrl) {
            $scope.mainImageUrl = imageUrl;
        };
        $scope.setPrice = function (index) {
            $scope.mainFlashPrice = $scope.phone.storage.price[index];
        };*/
  }]);
