<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<nav class="large-3 medium-4 columns pull-right" id="actions-sidebar">
    <?= $this->Html->link(__('Thêm mới'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Chỉnh sửa'), ['action' => 'edit', $feed->id], ['class' => 'btn btn-warning']) ?>
    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $feed->id], ['class' => 'btn btn-danger'] , ['confirm' => __('Are you sure you want to delete # {0}?', $feed->id)]) ?>
</nav>
<div class="feeds view large-9 medium-8 columns content">
    <table class="table table-bordered table-inverse nomargin">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($feed->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($feed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time Created') ?></th>
            <td><?= h($feed->time_created) ?></td>
        </tr>
    </table>
    <h3><?= h($feed->title) ?></h3>
    <div class="row">
        <div class="col-sm-4">
            <h4>Hình ảnh đại diện</h4>
            <?= $this->Html->image($feed->thumbnail, ["width" => "100%"]) ?>
        </div>
        <div class="col-sm-8">
            <h4>Nội dung tóm tắt</h4>
            <?= $feed->summary ?>
        </div>
    </div>
    <div class="row">
        <h4><?= __('Nội dung') ?></h4>
        <?= $feed->description ?>
    </div>
</div>
