'use strict';

/* Filters */
var personFilters = angular.module('personFilters', []);
personFilters.filter('checkmark', function () {
    return function (input) {
        return input ? '\u2713' : '\u2718';
    };
});

personFilters.filter('trustHtml', ['$sce', function ($sce) {
    return function (text) {
        return $sce.trustAsHtml(text);
    }
}]);
