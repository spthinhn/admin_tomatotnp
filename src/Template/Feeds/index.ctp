<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Feed'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="feeds index large-9 medium-8 columns content">
    <h3><?= __('Danh sách bài viết') ?></h3>

    <div class="table-responsive">
        <table class="table table-bordered table-inverse nomargin">
            <thead>
                <tr>
                    <th scope="col" width="5%"><?= $this->Paginator->sort('#') ?></th>
                    <th scope="col" width="10%"><?= $this->Paginator->sort('') ?></th>
                    <th scope="col" width="15%"><?= $this->Paginator->sort('Tiêu đề') ?></th>
                    <th scope="col" width="30%"><?= $this->Paginator->sort('Nội dung tóm tắt') ?></th>
                    <th scope="col" width="15%"><?= $this->Paginator->sort('Thời gian') ?></th>
                    <th scope="col" width="10%"class="actions"><?= __('') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feeds as $feed): ?>

                <tr>
                    <td align="center"><?= $this->Number->format($feed->id) ?></td>
                    <td><?= $this->Html->image($feed->thumbnail, ["width" => "100%"]) ?></td>
                    <td><?= h($feed->title) ?></td>
                    <td><?= h($feed->summary) ?></td>
                    <td><?= h($feed->created) ?></td>
                    <td class="actions" align="center">
                        <button class="btn btn-primary btn-icon" onclick="location.href=('<?= $this->Url->build([
                            "action" => "view",
                            $feed->id
                        ]); ?>')"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-warning btn-icon" onclick="location.href=('<?= $this->Url->build([
                            "action" => "edit",
                            $feed->id
                        ]); ?>')"><i class="fa fa-edit"></i></button>
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
