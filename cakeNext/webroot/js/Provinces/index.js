var app = angular.module('app', []);

app.controller('ProvinceCRUDCtrl', ['$scope', 'ProvinceCRUDService', function ($scope, ProvinceCRUDService) {

        $scope.updateProvince = function () {
            ProvinceCRUDService.updateProvince($scope.province.id, $scope.province.name, $scope.province.code)
                    .then(function success(response) {
                        $scope.message = 'Province data updated!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating province!';
                                $scope.message = '';
                            });
        }

        $scope.getProvince = function () {
            var id = $scope.province.id;
            ProvinceCRUDService.getProvince($scope.province.id)
                    .then(function success(response) {
                        $scope.province = response.data.province;
//                        $scope.province.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Province not found!';
                                } else {
                                    $scope.errorMessage = "Error getting province!";
                                }
                            });
        }

        $scope.addProvince = function () {
            if ($scope.province != null && $scope.province.name) {
                ProvinceCRUDService.addProvince($scope.province.name, $scope.province.code)
                        .then(function success(response) {
                            $scope.message = 'Province added!';
                            $scope.errorMessage = '';
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding province!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteProvince = function () {
            ProvinceCRUDService.deleteProvince($scope.province.id)
                    .then(function success(response) {
                        $scope.message = 'Province deleted!';
                        $scope.province = null;
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting province!';
                                $scope.message = '';
                            })
        }

        $scope.getAllProvinces = function () {
            ProvinceCRUDService.getAllProvinces()
                    .then(function success(response) {
                        $scope.provinces = response.data.provinces;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting provinces!';
                            });
        }

    }]);

app.service('ProvinceCRUDService', ['$http', function ($http) {

        this.getProvince = function getProvince(provinceId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + provinceId,
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


