<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="title">Meta tiêu đề</label>
                <input type="text" name="meta_title" class="form-control" placeholder="Title" required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="summary">Meta mô tả</label>
                <input type="text" name="meta_description" class="form-control" placeholder="Title" required />
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="post_type">Loại bài viết</label>
                <select id="post_type" name="type" class="form-control" style="width: 100%" >
                  <option value="post">Bài viết</option>
                  <option value="introduce">Giới thiệu</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" class="form-control" placeholder="Title" required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="title">Tiêu đề SEO</label>
                <input type="text" name="alias" class="form-control" placeholder="Title SEO" required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="summary">Nội dung tóm tắt</label>
                <textarea class="summernote" name="summary">
                    
                </textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Nội dung</label>
                <textarea class="summernote" name="description">
                    
                </textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
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