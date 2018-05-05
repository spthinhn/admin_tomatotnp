
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" name="title" class="form-control"/>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">alias</label>
                <input type="text" name="alias" class="form-control"/>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Gía</label>
                <input type="text" name="price" class="form-control"/>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <select class="form-control" name="category_id">
                <?php foreach ($categories as $key => $category) : ?>
                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Giới thiệu</label>
                <textarea class="summernote" name="info"></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label>Khối lượng tịnh</label>
                <input type="text" name="weight" class="form-control"/>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Hướng dẫn sử dụng</label>
                <textarea class="summernote" name="guide_use"></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Hướng dẫn bảo quản</label>
                <textarea class="summernote" name="guid_preservation"></textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label>Hạn sử dụng</label>
                <input type="text" name="expiried" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Nhà phân phối</label>
                <textarea class="summernote" name="distribution"></textarea>
            </div>
        </div>

        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Nội dung</label>
                <textarea class="summernote" name="description"></textarea>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                <input type="file" name="files[]" >
                <input type="file" name="files[]" >
                <input type="file" name="files[]" >
                <input type="file" name="files[]" >
                <input type="file" name="files[]" >
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