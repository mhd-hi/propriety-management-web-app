var app = angular.module('linkedlists', []);

app.controller('provincesController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.provinces = response.data.provinces;
        
    });
});

