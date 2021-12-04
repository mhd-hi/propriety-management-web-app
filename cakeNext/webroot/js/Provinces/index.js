var app = angular.module('app', []);

app.controller('ProvinceCRUDCtrl', ['$scope', 'ProvinceCRUDService', function ($scope, ProvinceCRUDService) {

    $scope.updateProvince = function () {
        ProvinceCRUDService.updateProvince($scope.Province.id, $scope.Province.name, $scope.Province.code)
                .then(function success(response) {
                    $scope.message = 'Province data updated!';
                    $scope.errorMessage = '';
                },
                        function error(response) {
                            $scope.errorMessage = 'Error updating Province!';
                            $scope.message = '';
                        });
    }

    $scope.getProvince = function () {
        var id = $scope.Province.id;
        ProvinceCRUDService.getProvince($scope.Province.id)
                .then(function success(response) {
                    $scope.Province = response.data.Province;
//                        $scope.Province.id = id;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                        function error(response) {
                            $scope.message = '';
                            if (response.status === 404) {
                                $scope.errorMessage = 'Province not found!';
                            } else {
                                $scope.errorMessage = "Error getting Province!";
                            }
                        });
    }

    $scope.addProvince = function () {
        if ($scope.Province != null && $scope.Province.name) {
            ProvinceCRUDService.addProvince($scope.Province.name, $scope.Province.code)
                    .then(function success(response) {
                        $scope.message = 'Province added!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error adding Province!';
                                $scope.message = '';
                            });
        } else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }

    $scope.deleteProvince = function () {
        ProvinceCRUDService.deleteProvince($scope.Province.id)
                .then(function success(response) {
                    $scope.message = 'Province deleted!';
                    $scope.Province = null;
                    $scope.errorMessage = '';
                },
                        function error(response) {
                            $scope.errorMessage = 'Error deleting Province!';
                            $scope.message = '';
                        })
    }

    $scope.getAllProvinces = function () {
        ProvinceCRUDService.getAllProvinces()
                .then(function success(response) {
                    $scope.Provinces = response.data.Provinces;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                        function error(response) {
                            $scope.message = '';
                            $scope.errorMessage = 'Error getting Provinces!';
                        });
    }

}]);

app.service('ProvinceCRUDService', ['$http', function ($http) {

    this.getProvince = function getProvince(ProvinceId) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + ProvinceId,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.addProvince = function addProvince(name, code) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            data: {name: name, code: code},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.deleteProvince = function deleteProvince(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        })
    }

    this.updateProvince = function updateProvince(id, name, code) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + id,
            data: {name: name, code: code},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        })
    }

    this.getAllProvinces = function getAllProvinces() {
        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

}]);