<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Municipality $municipality
 */
?>

<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Regions",
    "action" => "getByProvince",
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
        <div class="municipalities form content">
            <?= $this->Form->create($municipality) ?>
            <fieldset>
                <legend><?= __('Add municipality') ?></legend>
                <?php
                    echo $this->Form->control('province_id', ['options' => $provinces]);
                    echo $this->Form->control('region_id', ['options' => [__('Please select a province first')]]);
                    echo $this->Form->control('code');
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
