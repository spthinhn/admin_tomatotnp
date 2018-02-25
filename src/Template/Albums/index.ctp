<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Album'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medias'), ['controller' => 'Medias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Media'), ['controller' => 'Medias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="albums index large-9 medium-8 columns content">
    <h3><?= __('Albums') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-inverse nomargin">
            <thead>
                <tr>
                    <th width="5%" scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th width="20%" scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th width="10%" scope="col"><?= $this->Paginator->sort('image') ?></th>
                    <th width="20%" scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th width="20%" scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($albums as $album): ?>
                <tr>
                    <td><?= $this->Number->format($album->id) ?></td>
                    <td><?= h($album->title) ?></td>
                    <td><img width="100%" src="<?= $album->thumbnail ?>" /></td>
                    <td><?= h($album->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $album->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $album->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $album->id], ['confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
