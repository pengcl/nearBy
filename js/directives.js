'use strict';

/* Directives */
var bannerInit = function () {
    var windowHeight, signInfoHeight, signPanelHeight, logoHeight;
    windowHeight = $(window).height();
    signInfoHeight = $(".bottom-info").outerHeight(true);
    signPanelHeight = $(".sign-panel").outerHeight(true);
    logoHeight = windowHeight - signPanelHeight - signInfoHeight;
    $(".banner").height(logoHeight);
};

var nearbyDirectives = angular.module('nearbyDirectives', []);

nearbyDirectives.directive('loginDialog', function (AUTH_EVENTS) {
    return {
        restrict: 'A',
        template: '<div ng-if="visible" ng-include = "\'login-form.html\'" >',
        link: function (scope) {
            var showDialog = function () {
                scope.visible = true;
            };

            scope.visible = false;
            scope.$on(AUTH_EVENTS.notAuthenticated, showDialog);
            scope.$on(AUTH_EVENTS.sessionTimeout, showDialog)
        }
    };
});
