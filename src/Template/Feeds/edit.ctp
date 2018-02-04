<nav class="large-3 medium-4 columns pull-right" id="actions-sidebar">
    <?= $this->Html->link(__('Xem chi tiết'), ['action' => 'view',  $feed->id], ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $feed->id], ['class' => 'btn btn-danger'] , ['confirm' => __('Are you sure you want to delete # {0}?', $feed->id)]) ?>
</nav>


<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="<?= $feed->title ?>" placeholder="Type your name..." required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="summary">Nội dung tóm tắt</label>
                <textarea class="summernote" name="summary">
                    <?= $feed->summary ?>
                </textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Nội dung</label>
                <textarea class="summernote" name="description">
                    <?= $feed->description ?>
                </textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <?php if ($feed->thumbnail) : ?>
            <div class="col-xs-2">
                <?= $this->Html->image($feed->thumbnail, ["width" => "100%"]) ?>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="description">Hình ảnh đại diện</label>
                <input type="file" name="files">
            </div>
        </div>
        
        <div class="col-sm-12 text-right" style="margin-top: 20px">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>