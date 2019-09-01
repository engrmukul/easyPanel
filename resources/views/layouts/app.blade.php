<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>APSIS ENGINE</title>
        {{--CSS--}}
        <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
        {{--JS--}}
        <script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('public/js/popper.min.js')}}"></script>
        <script src="{{asset('public/js/bootstrap.js')}}"></script>
        <script src="{{asset('public/js/plugins/bootstrap-validator/validator.min.js')}}"></script>
        <script src="{{asset('public/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('public/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('public/js/inspinia.js')}}"></script>
        <script src="{{asset('public/js/plugins/pace/pace.min.js')}}"></script>
        <script src="{{asset('public/js/plugins/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('public/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

    </head>
    <body>
        <div id="wrapper">
            @include('includes.sidebar')
            <div id="page-wrapper" class="gray-bg">
                @include('includes.header')
                @include('includes.breadcrumb')
                @yield('content')
                @include('includes.footer')
            </div>
        </div>
    </body>
</html>

<script>
    $(document).ready(function(){
        $('form').validator();
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            columnDefs: [
                { "orderable": false, "targets": 0 }
            ],
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });

</script>
