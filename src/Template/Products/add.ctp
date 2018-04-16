<form id="basicForm" action="form-validation.html">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>price <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
            
            <div class="form-group">
                <label>expiried <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
            <div class="form-group">
                <label>distribution <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
            <div class="form-group">
                <label>category <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Giới thiệu</label>
                <textarea class="summernote" name="info">
                </textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label>Khối lượng tịnh <span class="text-danger">*</span></label>
                <input type="text" name="weight" class="form-control" placeholder="Type your name..." required />
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Hướng dẫn sử dụng</label>
                <textarea class="summernote" name="use_guide">
                </textarea>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Hướng dẫn bảo quản</label>
                <textarea class="summernote" name="preservation_guide">
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label>expiried <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
        </div>
        <div class="col-xs-12" style="margin-top: 20px">
            <div class="form-group">
                <label for="description">Nội dung</label>
                <textarea class="summernote" name="description">
                    
                </textarea>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                <input type="file" name="files[]" id="exampleInputFile">
                <input type="file" name="files[]" id="exampleInputFile">
                <input type="file" name="files[]" id="exampleInputFile">
                <input type="file" name="files[]" id="exampleInputFile">
                <input type="file" name="files[]" id="exampleInputFile">
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