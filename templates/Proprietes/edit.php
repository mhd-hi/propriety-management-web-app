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
