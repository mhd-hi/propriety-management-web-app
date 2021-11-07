<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region[]|\Cake\Collection\CollectionInterface $regions
 */
?>
<div class="regions index content">
    <?= $this->Html->link(__('New Region'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Regions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('province_id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($regions as $region): ?>
                <tr>
                    <td><?= $this->Number->format($region->id) ?></td>
                    <td><?= $region->has('province') ? $this->Html->link($region->province->name, ['controller' => 'Provinces', 'action' => 'view', $region->province->id]) : '' ?></td>
                    <td><?= h($region->code) ?></td>
                    <td><?= h($region->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $region->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $region->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
