<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Medias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medias form large-9 medium-8 columns content">
    <?= $this->Form->create($media) ?>
    <fieldset>
        <legend><?= __('Add Media') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('url');
            echo $this->Form->input('type');
            echo $this->Form->input('uri');
            echo $this->Form->input('album_id', ['options' => $albums]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
