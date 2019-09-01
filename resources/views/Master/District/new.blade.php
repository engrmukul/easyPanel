<form action="{{url("districts-list")}}" id="district" type="POST" enctype="multipart/form-data">{{csrf_field()}}<input
            type="hidden" name="pkid" value="" id="pkid">
    <div class="form-group  row"><label class="col-sm-2 col-form-label">District Id</label>
        <div class="col-sm-10"><input type="number" name="district_id" value="" class="form-control district_id"
                                      placeholder="Enter district_id" required>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="form-group  row"><label class="col-sm-2 col-form-label">Countrys Id</label>
        <div class="col-sm-10"><input type="number" name="countrys_id" value="" class="form-control countrys_id"
                                      placeholder="Enter countrys_id" required>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="form-group  row"><label class="col-sm-2 col-form-label">District Name</label>
        <div class="col-sm-10"><input type="text" name="district_name" value="" class="form-control district_name"
                                      placeholder="Enter district_name" required>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="form-group  row"><label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10"><textarea class="form-control description " name="description"
                                         placeholder="Enter Description" required></textarea>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="form-group  row"><label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-primary btn-sm" type="submit">Save Data</button>
        </div>
    </div>
</form>