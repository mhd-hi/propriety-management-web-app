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
            <?= $this->Form->postLink(__('Delete Propriete'), ['action' => 'delete', $propriete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propriete->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Proprietes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Propriete'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="proprietes view content">
            <h3><?= h($propriete->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($propriete->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $propriete->has('user') ? $this->Html->link($propriete->user->name, ['controller' => 'Users', 'action' => 'view', $propriete->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($propriete->type) ?></td>
                </tr>
                <!--<tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($propriete->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($propriete->id) ?></td>
                </tr>-->
                <tr>
                    <th><?= __('Municipality') ?></th>
                    <td><?= h($propriete->municipality['name']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($propriete->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($propriete->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($propriete->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($propriete->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sold') ?></th>
                    <td><?= $propriete->sold ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Characteristics') ?></h4>
                <?php if (!empty($propriete->characteristics)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($propriete->characteristics as $characteristics) : ?>
                        <tr>
                            <td><?= h($characteristics->id) ?></td>
                            <td><?= h($characteristics->name) ?></td>
                            <td><?= h($characteristics->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Characteristics', 'action' => 'view', $characteristics->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Characteristics', 'action' => 'edit', $characteristics->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Characteristics', 'action' => 'delete', $characteristics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $characteristics->id)]) ?>
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
