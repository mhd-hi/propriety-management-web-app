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
            <?= $this->Html->link(__('Edit Propriete'), ['action' => 'edit', $propriete->id], ['class' => 'side-nav-item']) ?>
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
                    <th><?= __('State') ?></th>
                    <td><?= $propriete->state ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Photos') ?></h4>
                <?php if (!empty($propriete->photos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Propriete Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Filename') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($propriete->photos as $photos) : ?>
                        <tr>
                            <td><?= h($photos->id) ?></td>
                            <td><?= h($photos->propriete_id) ?></td>
                            <td><?= h($photos->title) ?></td>
                            <td><?= h($photos->date) ?></td>
                            <td><?= h($photos->filename) ?></td>
                            <td><?= h($photos->created) ?></td>
                            <td><?= h($photos->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Photos', 'action' => 'view', $photos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Photos', 'action' => 'edit', $photos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Photos', 'action' => 'delete', $photos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photos->id)]) ?>
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
