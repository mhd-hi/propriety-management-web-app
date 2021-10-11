<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic $characteristic
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Characteristic'), ['action' => 'edit', $characteristic->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Characteristic'), ['action' => 'delete', $characteristic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $characteristic->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Characteristics'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Characteristic'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="characteristics view content">
            <h3><?= h($characteristic->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($characteristic->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($characteristic->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($characteristic->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Proprietes') ?></h4>
                <?php if (!empty($characteristic->proprietes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($characteristic->proprietes as $proprietes) : ?>
                        <tr>
                            <td><?= h($proprietes->id) ?></td>
                            <td><?= h($proprietes->address) ?></td>
                            <td><?= h($proprietes->user_id) ?></td>
                            <td><?= h($proprietes->type) ?></td>
                            <td><?= h($proprietes->slug) ?></td>
                            <td><?= h($proprietes->state) ?></td>
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
