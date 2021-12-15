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
            <?= $this->Html->link(__('Edit Municipality'), ['action' => 'edit', $municipality->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Municipality'), ['action' => 'delete', $municipality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $municipality->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Municipalities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Municipality'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="municipalities view content">
            <h3><?= h($municipality->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Province') ?></th>
                    <td><?= $municipality->has('province') ? $this->Html->link($municipality->province->name, ['controller' => 'Provinces', 'action' => 'view', $municipality->province->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Region') ?></th>
                    <td><?= $municipality->has('region') ? $this->Html->link($municipality->region->name, ['controller' => 'Regions', 'action' => 'view', $municipality->region->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($municipality->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($municipality->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($municipality->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Proprietes') ?></h4>
                <?php if (!empty($municipality->proprietes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Municipality Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Sold') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($municipality->proprietes as $proprietes) : ?>
                        <tr>
                            <td><?= h($proprietes->id) ?></td>
                            <td><?= h($proprietes->address) ?></td>
                            <td><?= h($proprietes->user_id) ?></td>
                            <td><?= h($proprietes->municipality_id) ?></td>
                            <td><?= h($proprietes->type) ?></td>
                            <td><?= h($proprietes->slug) ?></td>
                            <td><?= h($proprietes->sold) ?></td>
                            <td><?= h($proprietes->image) ?></td>
                            <td><?= h($proprietes->price) ?></td>
                            <td><?= h($proprietes->created) ?></td>
                            <td><?= h($proprietes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Proprietes', 'action' => 'view', $proprietes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Proprietes', 'action' => 'edit', $proprietes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Proprietes', 'action' => 'delete', $proprietes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proprietes->id)]) ?>
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
