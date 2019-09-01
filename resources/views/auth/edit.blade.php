@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">User Edit</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">EDIT</h3>
                    <span id="msg"></span>
                    <div class="btn-group btn-group-sm pull-right" role="group">
                        <a href="{{ route('users') }}" class="btn btn-success" title="user list">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <section class="content">
                        <div class="row">
                            <form method="post" action="#" id="userFile" enctype="multipart/form-data">
                                <meta name="_token" content="{{ csrf_token() }}"/>
                                <div class="col-md-3">
                                    <div class="box box-primary">
                                        <div class="box-body box-profile">
                                            <div class="input-group image-preview">
                                                <input type="text" class="form-control image-preview-filename"
                                                       disabled="disabled">
                                                <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear"
                                                        style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                    <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" id="file" name="file"/>
                                                    <!-- rename it -->

                                                </div>
                                            </span>
                                            </div>
                                            
                                            @if(!empty($user->user_image))
                                              <img width="80%" src="<?php echo URL::to('uploads/users/' . $user->user_image)?>"
                                                   class="img-circle" alt="User Image">
                                            @else
                                              <img width="80%" src="<?php echo URL::to('uploads/users/no-image.png')?>"
                                               class="img-circle" alt="User Image">
                                            @endif


                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-9">
                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                            <p>
                                                <small>Basic</small>
                                            </p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle"
                                               disabled="disabled">2</a>
                                            <p>
                                                <small>Address</small>
                                            </p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle"
                                               disabled="disabled">3</a>
                                            <p>
                                                <small>Credential</small>
                                            </p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle"
                                               disabled="disabled">4</a>
                                            <p>
                                                <small>Permission</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" id="form1" action="#">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{optional($user)->id}}">
                                    <div class="panel panel-warning setup-content" id="step-1">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Basic</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('First Name') }}</label>
                                                        <input id="name" type="text"
                                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                               name="name"
                                                               value="{{ old('name',optional($user)->name) }}"
                                                               placeholder="Enter First Name" tabindex="1"
                                                               required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name">{{ __('Last Name') }}</label>
                                                        <input id="last_name" type="text"
                                                               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                               name="last_name"
                                                               value="{{ old('last_name',optional($user)->last_name) }}"
                                                               placeholder="Enter Last Name"
                                                               tabindex="2" required>

                                                        @if ($errors->has('last_name'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mobile">{{ __('Mobile') }}</label>
                                                        <input id="name" type="text"
                                                               class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                               name="mobile" maxlength="11"
                                                               value="{{ old('mobile',optional($user)->mobile) }}"
                                                               placeholder="Enter Mobile" tabindex="3"
                                                               required>
                                                        @if ($errors->has('mobile'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('mobile') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Religion</label>
                                                        <select name="religion_id" class="form-control select2"
                                                                tabindex="4"
                                                                style="width: 100%;">
                                                            <option value="1">Muslim</option>
                                                            <option value="2">Hindsm</option>
                                                            <option value="3">Cristian</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control select2"
                                                                tabindex="5" style="width: 100%;">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date Of Birth:</label>

                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input id="datepicker" type="text"
                                                                   class="form-control pull-right{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}"
                                                                   name="date_of_birth"
                                                                   value="{{ old('date_of_birth',optional($user)->date_of_birth) }}"
                                                                   placeholder="Enter DOB" tabindex="6" required>

                                                            @if ($errors->has('date_of_birth'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <button class="btn btn-primary form1 nextBtn pull-right"
                                                            type="button">Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" id="form2" action="#">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{optional($user)->id}}">

                                    <div class="panel panel-warning setup-content" id="step-2">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Address</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <select name="location_id" class="form-control select2"
                                                                tabindex="11"
                                                                style="width: 100%;">
                                                            <option value="1">Dhaka</option>
                                                            <option value="2">Rajsahi</option>
                                                        </select>
                                                        @if ($errors->has('location_id'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('location_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Line Manager</label>
                                                        <select name="line_manager_id" class="form-control select2"
                                                                tabindex="12"
                                                                style="width: 100%;">
                                                            <option>Select Line Manager</option>
                                                            @foreach($linemanager as $lm)
                                                                <option value="{{$lm->id}}"{{ old('line_manager_id',optional($user)->line_manager_id) == $lm->id ? 'selected' : ''}}>{{$lm->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('line_manager_id'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('line_manager_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <select name="department_id" class="form-control select2"
                                                                tabindex="13"
                                                                style="width: 100%;">
                                                            <option value="">Select Department</option>
                                                            @foreach($departments as $department)
                                                                <option value="{{$department->id}}"{{ old('department_id',optional($user)->department_id) == $department->id ? 'selected' : ''}}>{{$department->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('department_id'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('department_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <select name="designation_id" class="form-control select2"
                                                                tabindex="14"
                                                                style="width: 100%;">
                                                            <option value="">Select designation</option>
                                                            @foreach($designations as $desination)
                                                                <option value="{{$desination->id}}"{{ old('designation_id',optional($user)->designation_id) == $desination->id ? 'selected' : ''}}>{{$desination->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('designation_id'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('designation_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <button class="btn btn-primary form2 nextBtn pull-right"
                                                            type="button">
                                                        Next
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" id="form3" action="#">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{optional($user)->id}}">

                                    <div class="panel panel-warning setup-content" id="step-3">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Credential</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="last_name">{{ __('Email Address') }}</label>
                                                        <input id="email" type="email"
                                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                               name="email"
                                                               value="{{ old('email',optional($user)->email) }}"
                                                               tabindex="7"
                                                               placeholder="Enter Email Address" required>

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback">
                                                                 <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <!-- /.form-group -->

                                                    <div class="form-group">
                                                        <label for="username">{{ __('Username') }}</label>
                                                        <input id="username" type="text"
                                                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                               name="username"
                                                               value="{{ old('username',optional($user)->username) }}"
                                                               tabindex="8"
                                                               placeholder="Enter username" required>

                                                        @if ($errors->has('username'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('username') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">{{ __('Password') }}</label>
                                                        <input id="password" type="password"
                                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                               name="password" placeholder="Enter Password"
                                                               tabindex="9" required>

                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback">
                                                                 <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">{{ __('Confirm Password') }}</label>
                                                        <input id="password-confirm" type="password"
                                                               class="form-control"
                                                               name="password_confirmation" tabindex="10"
                                                               placeholder="Enter Confirm Password"
                                                               required>
                                                    </div>
                                                    <button class="btn btn-primary form3 nextBtn pull-right"
                                                            type="button">
                                                        Next
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" id="form4" action="#">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{optional($user)->id}}">

                                    <div class="panel panel-warning setup-content" id="step-4">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Permission</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Default Module</label>
                                                        <select name="default_module_id"
                                                                class="form-control select2" tabindex="15"
                                                                style="width: 100%;">
                                                            @foreach($allmodules as $md)
                                                                <option value="{{$md->id}}"{{ old('default_module_id') == @$user->default_module_id ? 'selected' : ''}}>{{$md->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('default_module_id'))
                                                            <span class="invalid-feedback">
                                                                 <strong>{{ $errors->first('default_module_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Module Privilege</label>
                                                        <select name="user_module_id[]" id="module"
                                                                class="form-control select2 select2-hidden-accessible"
                                                                multiple="" style="width: 100%;" tabindex="-1"
                                                                aria-hidden="true">
                                                            @foreach($allmodules as $md)
                                                                <option value="{{$md->id}}" @if(in_array($md->id,$userModules)){{{'selected'}}} @endif>{{$md->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Level Privilege</label>
                                                        <select name="user_level_id[]" id="level"
                                                                class="form-control select2 select2-hidden-accessible"
                                                                multiple="" style="width: 100%;" tabindex="-1"
                                                                aria-hidden="true">
                                                            @foreach($user_levels as $levels)
                                                                <option value="{{$levels->id}}" @if(in_array($levels->id,$userLevels)){{{'selected'}}} @endif>{{$levels->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control select2"
                                                                tabindex="4"
                                                                style="width: 100%;">
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>
                                                        @if ($errors->has('status'))
                                                            <span class="invalid-feedback">
                                                                 <strong>{{ $errors->first('status') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <button class="btn btn-success form4 pull-right" type="button">
                                                        Finish!
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <style>
        .stepwizard-step p {
            margin-top: 0px;
            color: #666;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }

        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity: 1 !important;
            color: #bbb;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .container {
            margin-top: 20px;
        }

        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .image-preview-input-title {
            margin-left: 2px;
        }
        .red{
            color:red;
        }
    </style>
    <script>
        $(function () {

            $('#datepicker').datepicker({
                autoclose: true,
                dateFormat: 'yy-mm-dd'
            })
        });

        $('#datepicker').on('click', function () {
            formatDate($(this.val()))
        });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-success').addClass('btn-default');
                    $item.addClass('btn-success');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-success').trigger('click');
        });
        $(document).on('click', '#close-preview', function () {
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                },
                function () {
                    $('.image-preview').popover('hide');
                }
            );
        });
        $(function () {
            // Create the close button
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Upload</strong> <input type='button' class='btn-circle btn-md text-right' id='fileUpload'>" + $(closebtn)[0].outerHTML,
                content: "There's no image",
                placement: 'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function () {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function () {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }

        });

        function success_message(msg){
            return $("#msg").html("<div class=\"alert alert-success alert-dismissible\">\n" +
                "                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>\n" +
                "                        <span id=\"msg\"> " + msg + " </span>\n" +
                "                    </div>");
        }

        function fail_message(msg) {
            var error_message = '';
            $.each( msg, function( key, value ) {
                error_message += value+'<br>';

            });

            return $("#msg").html("<div class=\"alert alert-warning alert-dismissible\">\n" +
                "                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>\n" +
                "                        <span id=\"msg\"> " + error_message + " </span>\n" +
                "                    </div>");
        }

        $(".form1").click(function (e) {
            e.preventDefault();
            var data = $('#form1').serialize() + "&user_id=" + '<?php echo $id?>' + "&form=form1";
            console.log(data);
            $.ajax({
                type: 'POST',
                url: '<?php echo URL::to('userUpdateForm');?>',
                data: data,
                success: function (data) {
                    if (data.status == 'success') {
                        success_message(data.message);
                    } else {
                        var obj = eval(data.message);
                        fail_message(obj);
                    }
                }
            });
        });

        $(".form2").click(function (e) {
            e.preventDefault();
            var data = $('#form2').serialize() + "&user_id=" + '<?php echo $id?>' + "&form=form2";
            $.ajax({
                type: 'POST',
                url: '<?php echo URL::to('userUpdateForm');?>',
                data: data,
                success: function (data) {
                    if (data.status == 'success') {
                        success_message(data.message);
                    } else {
                        var obj = eval(data.message);
                        fail_message(obj);
                    }
                }
            });
        });

        $(".form3").click(function (e) {
            e.preventDefault();
            var data = $('#form3').serialize() + "&user_id=" + '<?php echo $id?>' + "&form=form3";
            console.log(data);
            $.ajax({
                type: 'POST',
                url: '<?php echo URL::to('userUpdateForm');?>',
                data: data,
                success: function (data) {
                    if (data.status == 'success') {
                        success_message(data.message);
                    } else {
                        var obj = eval(data.message);
                        fail_message(obj);
                    }
                }
            });
        });

        $(".form4").click(function (e) {
            e.preventDefault();
            if($('#module').val()==''){
                $('#module').prop('required',true);
                $('#module').after('<div class="red">Module is Required</div>');
            }
            if($('#level').val()==''){
                $('#level').prop('required',true);
                $('#level').after('<div class="red">Level is Required</div>');
            }
            var data = $('#form4').serialize() + "&user_id=" + '<?php echo $id?>' + "&form=form4";
            console.log(data);
            $.ajax({
                type: 'POST',
                url: '<?php echo URL::to('userUpdateForm');?>',
                data: data,
                success: function (data) {
                    //alert(data.success);
                    window.location.href = "<?php echo URL::to('users');?>";
                }
            });
        });

        //file upload
        $(document).on('click', '#fileUpload', function () {

            var file_name = $('#file').prop('files')[0];
            var file_data = new FormData('#userFile');
            file_data.append('file', file_name);
            console.log(file_name);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo URL::to('userFIleUpload');?>',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: file_data,
                type: 'post',
                success: function (output) {
                    var userData = "user_id=" + '<?php echo $id;?>' + "&user_image=" + output + "&form=form2";
                    console.log(userData);
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo URL::to('userImageUpdate');?>',
                        data: userData,
                        success: function (data) {
                            if(data.message){
                                success_message(data.message);
                            }else{
                                fail_message(data.message);
                            }
                        }
                    });
                }
            });
        });

    </script>
@stop
