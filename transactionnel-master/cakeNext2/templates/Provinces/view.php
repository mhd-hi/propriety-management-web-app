<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province $province
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Province'), ['action' => 'edit', $province->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Province'), ['action' => 'delete', $province->id], ['confirm' => __('Are you sure you want to delete # {0}?', $province->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Provinces'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Province'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provinces view content">
            <h3><?= h($province->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($province->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($province->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($province->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Municipalities') ?></h4>
                <?php if (!empty($province->municipalities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Province Id') ?></th>
                            <th><?= __('Region Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($province->municipalities as $municipalities) : ?>
                        <tr>
                            <td><?= h($municipalities->id) ?></td>
                            <td><?= h($municipalities->province_id) ?></td>
                            <td><?= h($municipalities->region_id) ?></td>
                            <td><?= h($municipalities->code) ?></td>
                            <td><?= h($municipalities->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Municipalities', 'action' => 'view', $municipalities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Municipalities', 'action' => 'edit', $municipalities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Municipalities', 'action' => 'delete', $municipalities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $municipalities->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Regions') ?></h4>
                <?php if (!empty($province->regions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Province Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($province->regions as $regions) : ?>
                        <tr>
                            <td><?= h($regions->id) ?></td>
                            <td><?= h($regions->province_id) ?></td>
                            <td><?= h($regions->code) ?></td>
                            <td><?= h($regions->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Regions', 'action' => 'view', $regions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Regions', 'action' => 'edit', $regions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Regions', 'action' => 'delete', $regions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
