<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propriete $propriete
 */
?>

<?php
$urlToMunicipalitiesAutocompletedemoJson = $this->Url->build([
    "controller" => "Municipalities",
    "action" => "findMunicipalities",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToMunicipalitiesAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Proprietes/add_edit/municipalityAutocomplete', ['block' => 'scriptBottom']);
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propriete->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propriete->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Proprietes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="proprietes form content">
            <?= $this->Form->create($propriete) ?>
            <fieldset>
                <legend><?= __('Edit Propriete') ?></legend>
                <?php
                    echo $this->Form->control('address');


                    echo $this->Form->control('municipality_id', ['label' => '(municipality_id)', 'type' => 'hidden']);

                    //echo $this->Form->control('municipality_id', ['label' => __('Municipality') . ' (' . __('Autocomplete demo') . ')', 'type' => 'text', 'id' => 'autocomplete']);
                   ?>
    
                   <div class="input text">
                       <label for="autocomplete"><?= __("Municipality")?></Label>
                       <input id="autocomplete" type="text">
                   </div> 

                   <?php
                //    echo $this->Form->control('user_id', ['type' => 'hidden']);
                    echo $this->Form->control('type');
                //    echo $this->Form->control('slug');
                    
                    //echo $this->Form->control('image_file', ['type' => 'file']);


                    echo $this->Form->control('sold');
                    echo $this->Form->control('price');
                    echo $this->Form->control('characteristics._ids', ['options' => $characteristics]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
