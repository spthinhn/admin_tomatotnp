<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Album'), ['action' => 'edit', $album->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Album'), ['action' => 'delete', $album->id], ['confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Albums'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Album'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medias'), ['controller' => 'Medias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Media'), ['controller' => 'Medias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="albums view large-9 medium-8 columns content">
    <h3><?= h($album->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($album->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($album->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($album->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Medias') ?></h4>
        <?php if (!empty($album->medias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Uri') ?></th>
                <th scope="col"><?= __('Album Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($album->medias as $medias): ?>
            <tr>
                <td><?= h($medias->id) ?></td>
                <td><?= h($medias->title) ?></td>
                <td><?= h($medias->url) ?></td>
                <td><?= h($medias->type) ?></td>
                <td><?= h($medias->uri) ?></td>
                <td><?= h($medias->album_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Medias', 'action' => 'view', $medias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Medias', 'action' => 'edit', $medias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Medias', 'action' => 'delete', $medias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
