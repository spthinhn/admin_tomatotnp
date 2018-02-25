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
        <li><?= $this->Html->link(__('New Media'), ['controller' => 'Medias', 'action' => 'add', $album->id]) ?> </li>
    </ul>
</nav>
<div class="row">
    <div class="col-xs-6">
        <h3><?= $album->title ?></h3>
        <img width="100%" src="<?= $album->thumbnail ?>">
    </div>
    <div class="col-xs-6">
        <table class="table table-bordered table-inverse nomargin">
            <thead>
                <th width="5%" scope="col">Id</th>
                <th width="10%" scope="col"></th>
                <th width="10%" scope="col" class="actions"><?= __('Actions') ?></th>
            </thead>
            <tbody>
                <?php foreach ($album->medias as $key => $val): ?>
                <tr>
                    <td><?= $val->id ?></td>
                    <?php if ($val->uri): ?>
                    <td><img width="100%" src="<?= $val->uri ?>"></td>
                    <?php endif; ?>
                    <?php if ($val->url): ?>
                    <td><a href="<?= $val->url ?>" target="_blank"><?= $val->url ?></a></td>
                    <?php endif; ?>
                    <td><?= $this->Html->link(__('Xóa'), ['controller' => 'Medias', 'action' => 'delete', $val->id]) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>        
    </div>
</div>
