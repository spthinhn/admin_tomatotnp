<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Media'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medias index large-9 medium-8 columns content">
    <h3><?= __('Medias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uri') ?></th>
                <th scope="col"><?= $this->Paginator->sort('album_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medias as $media): ?>
            <tr>
                <td><?= $this->Number->format($media->id) ?></td>
                <td><?= h($media->title) ?></td>
                <td><?= h($media->url) ?></td>
                <td><?= h($media->type) ?></td>
                <td><?= h($media->uri) ?></td>
                <td><?= $media->has('album') ? $this->Html->link($media->album->title, ['controller' => 'Albums', 'action' => 'view', $media->album->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $media->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $media->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
