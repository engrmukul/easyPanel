<form action="{{url("Countries/index")}}"  id="countries" type="POST" enctype="multipart/form-data">{{csrf_field()}}<div class="form-group  row"><div class="col-sm-10"><input type="number" name="countries_id" value="" class="form-control countries_id" placeholder="Enter countries_id" ><div class="help-block with-errors has-feedback"></div></div></div><div class="form-group  row"><div class="col-sm-10"><input type="text" name="countries_name" value="" class="form-control countries_name" placeholder="Enter countries_name" ><div class="help-block with-errors has-feedback"></div></div></div><div class="form-group  row"><div class="col-sm-10"><div class="help-block with-errors has-feedback"></div></div></div><div class="form-group  row"><div class="col-sm-10"><div class="help-block with-errors has-feedback"></div></div></div><div class="hr-line-dashed"></div><div class="form-group row"><div class="col-sm-4 col-sm-offset-2"><button class="btn btn-primary btn-sm" type="submit">Search</button><a href="{{url("countriess")}}}"><button class="btn btn-primary btn-sm" type="submit">Reset</button></a></div></div></form>
