<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build('/api/provinces');
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Provinces/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="ProvinceCRUDCtrl">
    <table>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="id" ng-model="province.id" /></td>
        </tr>
        <tr>
            <td width="100">Name:</td>
            <td><input type="text" id="name" ng-model="province.name" /></td>
        </tr>
        <tr>
            <td width="100">Code:</td>
            <td><input type="text" id="code" ng-model="province.code" /></td>
        </tr>
    </table>
    <br /> <br /> 
    <a ng-click="getProvince(province.id)">[Get Province]</a> 
    <a ng-click="updateProvince(province.id, province.name, province.code)">[Update Province]</a> 
    <a ng-click="addProvince(province.name, province.code)">[Add Province]</a> 
<a ng-click="deleteProvince(province.id)">[Delete Province]</a>

    <br /> 
    <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>


    <br />
    <br /> 
    <a ng-click="getAllProvinces()">[Get all Provinces]</a><br /> 
    <br /> <br />
    <div ng-repeat="province in provinces">
        {{province.id}} {{province.name}} {{province.code}}
    </div>
     <!--pre ng-show='provinces'>{{provinces | json }}</pre-->
</div>