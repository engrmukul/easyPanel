<form action="{{url("test-list")}}" id="test" type="POST" enctype="multipart/form-data">{{csrf_field()}}<input type="hidden"
                                                                                                           name="pkid"
                                                                                                           value=""
                                                                                                           id="pkid">
    <div class="form-group  row"><label class="col-sm-2 col-form-label">Tests Id</label>
        <div
            class="col-sm-10">{!! ApsysHelper::__combo($pageData['tests']['combo_slug'],$pageData['tests']['combo_array']) !!}
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="form-group  row"><label class="col-sm-2 col-form-label">Tests Name</label>
        <div class="col-sm-10"><input type="text" name="tests_name" value="" class="form-control tests_name"
                                      placeholder="Enter tests_name" required>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="form-group  row"><label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10"><textarea class="form-control description " name="description"
                                         placeholder="Enter Description" required></textarea>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="form-group  row"><label class="col-sm-2 col-form-label">Updated By</label>
        <div class="col-sm-10"><input type="number" name="updated_by" value="" class="form-control updated_by"
                                      placeholder="Enter updated_by" required>
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
