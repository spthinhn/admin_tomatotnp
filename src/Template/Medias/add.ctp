<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="media_type">Loại media</label>
                <select id="media_type" name="type" class="form-control" style="width: 100%" >
                  <option value="image">Hình ảnh</option>
                  <option value="video">Video</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" class="form-control" placeholder="Title"  />
            </div>
        </div>
        <div id="image_view">
            <div class="col-xs-12" style="margin-top: 20px">
                <div class="form-group">
                    <label for="description">Hình ảnh</label>
                    <input type="file" name="files">
                </div>
            </div>
        </div>
        <div id="video_view" style="display: none;">
            <div class="col-xs-12" style="margin-top: 20px">
                <div class="form-group">
                    <label for="url">Đường dẫn</label>
                    <input type="text" name="url" class="form-control" placeholder="Url"  />
                </div>
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