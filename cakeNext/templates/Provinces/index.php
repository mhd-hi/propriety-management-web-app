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
    <input type="hidden" id="id" ng-model="province.id" class="ng-pristine ng-untouched ng-valid ng-not-empty" />
    <table>
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

    <button ng-click="updateProvince(province)">Mettre à jour Province</button> 
    <button ng-click="addProvince(province.name, province.code)">Ajouter Province</button> 

    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

        <!-- table pour la liste des Provinces -->
    <table class="hoverable bordered">
        <thead>
            <tr>
                <th class="text-align-center">ID</th>
                <th class="width-30-pct ">Nom</th>
                <th class="width-30-pct">Code</th>
                <th class="text-align-center">Actions</th>
            </tr>
        </thead>
        <tbody ng-init="getAllProvinces()">
            <tr ng-repeat="province in provinces | filter:search">
                <td class="text-align-center">
                    {{province.id}}
                </td>
                <td>
                    {{province.name}}
                </td>
                <td>
                    {{province.code}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getProvince(province.id)">Modifier</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteProvince(province.id)">Supprimer</button>
                </td>
            </tr>
        </tbody>
    </table>
        <!--debug-->
        <!--pre ng-show='provinces'>{{provinces | json }}</pre-->
</div>