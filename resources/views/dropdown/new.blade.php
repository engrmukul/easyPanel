<form method="post" action="{{url('dropdowns')}}" id='user_level_entry'>
    {{csrf_field()}}
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">DROPDOWN SLUG</label>
    <div class="col-sm-10">
        <input type="text" name="dropdown_slug" placeholder="Please Enter Dropdown Slug" class="form-control dropdown_slug" required>
        <input type="hidden" name="pkid" value="" id="pkid">
        <div class="help-block with-errors has-feedback"></div>
    </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">SQLTEXT</label>
        <div class="col-sm-10">
            <textarea name="sqltext" rows="4" cols="10" class="form-control sqltext"  required></textarea>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">VALUE FIELD</label>
        <div class="col-sm-10">
            <input type="text" name="value_field" placeholder="Please Enter Value Field" class="form-control value_field" required>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> OPTION FIELD</label>
        <div class="col-sm-10">
            <input type="text" name="option_field" placeholder="Please Enter Option Field" class="form-control option_field" required>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row"><label class="col-lg-2 col-form-label">MULTIPLE</label>
        <div class="col-lg-10">
            <input type="checkbox" name="multiple" value="1" class="form-control i-checks multiple"></div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">DROPDOWN NAME</label>
        <div class="col-lg-10">
            <input type="text" name="dropdown_name" placeholder="Please Enter Dropdown Name" class="form-control dropdown_name" required>
            <div class="help-block with-errors has-feedback"></div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">DESCRIPTION</label>
        <div class="col-sm-10">
            <textarea name="description" rows="4" cols="10" class="form-control description"></textarea>
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
