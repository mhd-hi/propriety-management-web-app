<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region $region
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Regions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Region'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="regions view content">
            <h3><?= h($region->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Province') ?></th>
                    <td><?= $region->has('province') ? $this->Html->link($region->province->name, ['controller' => 'Provinces', 'action' => 'view', $region->province->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($region->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($region->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($region->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Municipalities') ?></h4>
                <?php if (!empty($region->municipalities)) : ?>
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
                        <?php foreach ($region->municipalities as $municipalities) : ?>
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
        </div>
    </div>
</div>
