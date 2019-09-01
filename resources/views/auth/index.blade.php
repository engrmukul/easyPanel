@extends('layouts.app')
<link rel="stylesheet" href="{{asset('public/css/plugins/dataTables/datatables.min.css')}}">
<script src="{{asset('public/js/plugins/dataTables/datatables.min.css')}}"></script>
<script src="{{asset('public/js/plugins/dataTables/dataTables.bootstrap4.min.css')}}"></script>
@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <section class="content">
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span>
                    {!! session('success_message') !!}

                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
        @endif
        <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New User</h3>

                    <div class="box-tools pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs">Export</button>
                            <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><i class="fa fa-fw fa-file-excel-o"></i>CSV</a></li>
                                <li><a href="{{ route('user.excel') }}"><i
                                                class="fa fa-fw fa-file-excel-o"></i>Excel</a></li>
                                <li><a href="{{ route('user.downloadPdf') }}"><i
                                                class="fa fa-fw fa-file-pdf-o"></i>Pdf</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-hospital-o"></i>Json</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-html5"></i>Html</a></li>
                            </ul>


                            <a href="{{ route('register') }}" class="btn btn-info btn-xs"
                               title="Create New User">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                @if(count($users) == 0)
                    <div class="text-center">
                        <h4>No User Available!</h4>
                    </div>
                @else
                    <div class="box-body">

                        <table id="example2" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function () {
            $('#example2 thead tr').clone(true).appendTo( '#example2 thead' );
            $('#example2 thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();

                if(i==0) {
                    $(this).html('<input type="checkbox" id="checkedAll" />');
                }else{
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

                    $( 'input', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }

            } );

            var table = $('#example2').DataTable({
                'orderCellsTop': true,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "lengthChange": false,
                dom: 'Bfrtip',
                buttons: [
                    'colvis'
                ],
                "ajax":{
                    "url": "{{ url('allusers') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "mobile" },
                    { "data": "options", "orderable": false }
                ],
                'columnDefs': [
                    { width: 5, targets: 0 },
                    { width: 100, targets: 2 }
                ],
            });

            $( table.table().container() ).on( 'keyup', 'thead input', function () {
                table
                    .column( $(this).data('index') )
                    .search( this.value )
                    .draw();
            } );



            /************************ Select All ********************************/
            $("#checkedAll").on('click',function(){
                if(this.checked){
                    $(".checkSingle").each(function(){
                        this.checked=true;
                    })
                }else{
                    $(".checkSingle").each(function(){
                        this.checked=false;
                    })
                }
            });

            $(".checkSingle").click(function () {
                if ($(this).is(":checked")){
                    var isAllChecked = 0;
                    $(".checkSingle").each(function(){
                        if(!this.checked)
                            isAllChecked = 1;
                    })
                    if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }
                }else {
                    $("#checkedAll").prop("checked", false);
                }
            });

        });
    </script>


@endsection