<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Municipality $municipality
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $municipality->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $municipality->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Municipalities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="municipalities form content">
            <?= $this->Form->create($municipality) ?>
            <fieldset>
                <legend><?= __('Edit Municipality') ?></legend>
                <?php
                    echo $this->Form->control('province_id', ['options' => $provinces]);
                    echo $this->Form->control('region_id', ['options' => $regions]);
                    echo $this->Form->control('code');
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
