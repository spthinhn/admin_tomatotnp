<?php
$image1 = ""; $image2 = ""; $image3 = ""; $image4 = ""; $image5 = "";
$btn1 = ""; $btn2 = ""; $btn3 = ""; $btn4 = ""; $btn5 = "";


foreach ($product->product_images as $key => $value) {
    if ($value->position == 1) {
        $image1 = $this->Html->image($value->image, ["width" => "100%"]);
    }
    if ($value->position == 2) {
        $image2 = $this->Html->image($value->image, ["width" => "100%"]);
    }
    if ($value->position == 3) {
        $image3 = $this->Html->image($value->image, ["width" => "100%"]);
    }
    if ($value->position == 4) {
        $image4 = $this->Html->image($value->image, ["width" => "100%"]);
    }
    if ($value->position == 5) {
        $image5 = $this->Html->image($value->image, ["width" => "100%"]);
    }
}
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" name="title" class="form-control" value="<?= $product->title ?>" />
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">alias</label>
                <input type="text" name="alias" class="form-control" value="<?= $product->alias ?>" />
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Gía</label>
                <input type="text" name="price" class="form-control" value="<?= $product->price ?>" />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <select class="form-control" name="category_id">
            <?= $product->category_id ?>
                <?php foreach ($categories as $key => $category) : ?>
                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Giới thiệu</label>
                <textarea class="summernote" name="info"><?= $product->info ?></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label>Khối lượng tịnh</label>
                <textarea class="summernote" name="weight"><?= $product->weight ?></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Hướng dẫn sử dụng</label>
                <textarea class="summernote" name="guide_use"><?= $product->guide_use ?></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Hướng dẫn bảo quản</label>
                <textarea class="summernote" name="guid_preservation"><?= $product->guid_preservation ?></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label>Hạn sử dụng</label>
                <textarea class="summernote" name="expiried"><?= $product->expiried ?></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Liên hệ</label>
                <textarea class="summernote" name="distribution"><?= $product->distribution ?></textarea>
            </div>
        </div>

        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Nội dung</label>
                <textarea class="summernote" name="description"><?= $product->description ?></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="col-xs-2">
                <label>Hình 1</label>
                <input type="file" name="files[]" >
                <?= $image1 ?>
            </div>
            <div class="col-xs-2">
                <label>Hình 2</label>
                <input type="file" name="files[]" >
                <?= $image2 ?>
            </div>
            <div class="col-xs-2">
                <label>Hình 3</label>
                <input type="file" name="files[]" >
                <?= $image3 ?>
            </div>
            <div class="col-xs-2">
                <label>Hình 4</label>
                <input type="file" name="files[]" >
                <?= $image4 ?>
            </div>
            <div class="col-xs-2">
                <label>Hình 5</label>
                <input type="file" name="files[]" >
                <?= $image5 ?>
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
                  <button type="reset" class="btn btn-quirk btn-wide btn-default">Reset</button>
                </div>
            </div>
        </div>
    </div>
</form>