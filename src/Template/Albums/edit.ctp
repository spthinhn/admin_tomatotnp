<h1>Chinh sua Album</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="album_type">Loại album</label>
                <select id="album_type" name="type" class="form-control" style="width: 100%" >
                  <option value="album" <?= ($album->type == 'album'?'selected':'')  ?> >Hình ảnh</option>
                  <option value="video" <?= ($album->type == 'video'?'selected':'')  ?>>Video</option>
                  <option value="banner" <?= ($album->type == 'banner'?'selected':'')  ?>>Banner</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="<?= $album->title ?>" required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="title">Tiêu đề SEO</label>
                <input type="text" name="alias" class="form-control" placeholder="Title SEO" value="<?= $album->alias ?>" required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Nội dung</label>
                <textarea class="summernote" name="description">
                    <?= $album->description ?>
                </textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <?php if ($album->thumbnail) : ?>
            <div class="col-xs-2">
                <?= $this->Html->image($album->thumbnail, ["width" => "100%"]) ?>
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