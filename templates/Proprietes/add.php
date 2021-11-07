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
            <?= $this->Html->link(__('List Proprietes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="proprietes form content">
            <?= $this->Form->create($propriete, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Propriete') ?></legend>
                <?php
                    echo $this->Form->control('address');
                //    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
                echo $this->Form->control('municipality_id', ['label' => __('Municipality'), 'type' => 'text', 'id' => 'autocomplete']);
                    echo $this->Form->control('type');
                //    echo $this->Form->control('slug');
                    echo $this->Form->control('sold');
                    echo $this->Form->control('image_file', ['type' => 'file']);
                    echo $this->Form->control('price');
                    echo $this->Form->control('characteristics._ids', ['options' => $characteristics]);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
