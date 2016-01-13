'use strict';

/* App Module */
//https://blog.coding.net/blog/techniques-for-authentication-in-angular-js-applications?type=hot

var nearbyApp = angular.module('nearbyApp', [
  'ngRoute',
  'nearbyControllers',
  'nearbyService',
  'nearbyDirectives',
  'personFilters'
]);

nearbyApp.constant('AUTH_EVENTS', {
    loginSuccess: 'auth-login-success',
    loginFailed: 'auth-login-failed',
    logoutSuccess: 'auth-logout-success',
    sessionTimeout: 'auth-session-timeout',
    notAuthenticated: 'auth-not-authenticated',
    notAuthorized: 'auth-not-authorized'
});

nearbyApp.constant('USER_ROLES', {
    all: '*',
    admin: 'admin',
    editor: 'editor',
    guest: 'guest'
});

nearbyApp.config(['$routeProvider','USER_ROLES', function ($routeProvider,USER_ROLES) {
        $routeProvider.
        when('/login', {
            templateUrl: 'partials/sign-in.html',
            controller: 'NearbyLoginCtrl'
        }).
        when('/register', {
            templateUrl: 'partials/register.html',
            controller: 'NearbyRegisterCtrl'
        }).
        when('/product', {
            templateUrl: 'partials/productList.html',
            controller: 'ProductListCtrl'
        }).
        when('/person/:personId', {
            templateUrl: 'partials/productDetail.html',
            controller: 'ProductDetailCtrl'
        }).
        when('/admin', {
            templateUrl: 'partials/admin.html',
            controller: 'nearAdminCtrl',
            data: {
                authorizedRoles: [USER_ROLES.admin, USER_ROLES.editor]
            }
        }).
        otherwise({
            templateUrl: 'partials/welcome.html',
            controller: 'NearbyIndexCtrl'
        });
  }]).run(function ($rootScope, AUTH_EVENTS, AuthService) {
        $rootScope.$on('$routeChangStart', function (event, next) {
            var authorizedRoles = next.data.authorizedRoles;
            if (!AuthService.isAuthorized(authorizedRoles)) {
                event.preventDefault();
                if (AuthService.isAuthenticated()) {
                    // user is not allowed
                    $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
                } else {
                    // user is not logged in
                    $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
                }
            }
        });
    }).config(function ($httpProvider) {
        $httpProvider.interceptors.push(['$injector', function ($injector) {
                return $injector.get('AuthInterceptor');
        }
                                        ]);
    })
    .factory('AuthInterceptor', function ($rootScope, $q,
        AUTH_EVENTS) {
        return {
            responseError: function (response) {
                $rootScope.$broadcast({
                    401: AUTH_EVENTS.notAuthenticated,
                    403: AUTH_EVENTS.notAuthorized,
                    419: AUTH_EVENTS.sessionTimeout,
                    440: AUTH_EVENTS.sessionTimeout
                }[response.status], response);
                return $q.reject(response);
            }
        };
    });
