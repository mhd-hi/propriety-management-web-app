<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Municipality $municipality
 */
?>

<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Provinces",
    "action" => "getProvinces",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Municipalities/add_edit', ['block' => 'scriptBottom']);
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Municipalities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <!-- <div class="municipalities form content"> -->
        <div class="municipalities form content" ng-app="linkedlists" ng-controller="provincesController">
            <?= $this->Form->create($municipality) ?>
            <fieldset>
                <legend><?= __('Add municipality') ?></legend>
                <div>
                    <?= __('Provinces')?> : 
                    <select 
                        name="province_id"
                        id="province-id" 
                        ng-model="province" 
                        ng-options="province.name for province in provinces track by province.id"
                        >
                        <option value=''>Select</option>
                    </select>
                </div>
                <div>
                    <?= __('Regions') ?> : 
                    <!-- pre ng-show='provinces'>{{ provinces | json }}></pre-->
                    <select
                        name="region_id"
                        id="region-id" 
                        ng-disabled="!province" 
                        ng-model="region"
                        ng-options="region.name for region in province.regions track by region.id"
                        >
                        <option value=''>Select</option>
                    </select>
                </div>


                <?php
           //         echo $this->Form->control('province_id', ['options' => $provinces]);
           //         echo $this->Form->control('region_id', ['options' => [__('Please select a province first')]]);
                    echo $this->Form->control('code');
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
