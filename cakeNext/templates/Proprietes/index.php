<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propriete[]|\Cake\Collection\CollectionInterface $proprietes
 */
?>
<div class="proprietes index content">
    <?= $this->Html->link(__('New Propriete'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Proprietes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>

                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <!--<th><?= $this->Paginator->sort('slug') ?></th>-->
                    <th><?= $this->Paginator->sort('sold') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proprietes as $propriete): ?>
                <tr>
                    <td><?= h($propriete->address) ?></td>
                    <td><?= $propriete->has('user') ? $this->Html->link($propriete->user->name, ['controller' => 'Users', 'action' => 'view', $propriete->user->id]) : '' ?></td>
                    <td><?= h($propriete->type) ?></td>
                    <!--<td><?= h($propriete->slug) ?></td>-->
                    <td><?= h($propriete->sold) ? __('Yes') : __('No'); ?></td>
                    <td><?= @$this->Html->image('proprietes/' . $propriete->image, ['style' => 'max-width:70px;height:70px;border-radius:50%;']) 
                    ?></td>
                    <td><?= $this->Number->format($propriete->price) ?></td>
                    <td><?= h($propriete->created) ?></td>
                    <td><?= h($propriete->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $propriete->slug]) ?>
                        <?= $this->Html->link(__('(pdf)'), ['action' => 'view', $propriete->slug . '.pdf']) ?>
                        
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propriete->slug]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propriete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propriete->id)]) ?>
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