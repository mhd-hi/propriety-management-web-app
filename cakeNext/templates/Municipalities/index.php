<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Municipality[]|\Cake\Collection\CollectionInterface $municipalities
 */
?>
<div class="municipalities index content">
    <?= $this->Html->link(__('New Municipality'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Municipalities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('province_id') ?></th>
                    <th><?= $this->Paginator->sort('region_id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($municipalities as $municipality): ?>
                <tr>
                    <td><?= $this->Number->format($municipality->id) ?></td>
                    <td><?= $municipality->has('province') ? $this->Html->link($municipality->province->name, ['controller' => 'Provinces', 'action' => 'view', $municipality->province->id]) : '' ?></td>
                    <td><?= $municipality->has('region') ? $this->Html->link($municipality->region->name, ['controller' => 'Regions', 'action' => 'view', $municipality->region->id]) : '' ?></td>
                    <td><?= h($municipality->code) ?></td>
                    <td><?= h($municipality->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $municipality->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $municipality->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $municipality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $municipality->id)]) ?>
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
