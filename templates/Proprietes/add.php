<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propriete $propriete
 */
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
            <?= $this->Form->create($propriete) ?>
            <fieldset>
                <legend><?= __('Add Propriete') ?></legend>
                <?php
                    echo $this->Form->control('address');
                //    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
                    echo $this->Form->control('type');
                //    echo $this->Form->control('slug');
                    echo $this->Form->control('state');
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
