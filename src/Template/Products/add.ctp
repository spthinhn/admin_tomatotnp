<form id="basicForm" action="form-validation.html">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
            <div class="form-group">
                <label>price <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
            <div class="form-group">
                <label>info <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
            <div class="form-group">
                <label>weight <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>guide_use <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
            </div>
            <div class="form-group">
                <label>guid_preservation <span class="text-danger">*</span></label>
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
                <div class="col-sm-12">
                    <div id="summernote">Hello Summernote</div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    Images
                </div>
                <div class="panel-body">
                    <div class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </div>
                </div>
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