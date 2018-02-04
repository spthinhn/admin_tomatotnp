<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Media'), ['action' => 'edit', $media->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Media'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Media'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medias view large-9 medium-8 columns content">
    <h3><?= h($media->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($media->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($media->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($media->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uri') ?></th>
            <td><?= h($media->uri) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Album') ?></th>
            <td><?= $media->has('album') ? $this->Html->link($media->album->title, ['controller' => 'Albums', 'action' => 'view', $media->album->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($media->id) ?></td>
        </tr>
    </table>
</div>
