<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $propriete
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="proprietes view content">
            <h3><?= h($propriete->address) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $propriete->has('user') ? $this->Html->link($propriete->user->id, ['controller' => 'Users', 'action' => 'view', $propriete->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($propriete->address) ?></td>
                </tr>
                <!-- tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($propriete->slug) ?></td>
                </tr >
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($propriete->id) ?></td>
                </tr -->
                <tr>
                    <th><?= __('Municipality') ?></th>
                    <td><?= h($propriete->municipality['name']) ?></td>
                </tr >
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($propriete->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($propriete->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Published') ?></th>
                    <td><?= $propriete->published ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Type') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($propriete->type)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Characteristics') ?></h4>
                <?php if (!empty($propriete->characteristics)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Description') ?></th>
                            </tr>
                            <?php foreach ($propriete->characteristics as $characteristics) : ?>
                                <tr>
                                    <td><?= h($characteristics->id) ?></td>
                                    <td><?= h($characteristics->name) ?></td>
                                    <td><?= h($characteristics->description) ?></td>
                               </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
