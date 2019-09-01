<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    @foreach($pageData['action'] as $key=>$action)
                        {{Form::button(ucfirst($key), (array)$action)}}
                    @endforeach
                    <h5>Basic Data Tables example with responsive plugin</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <input type="hidden" name="getRawUrl" value="{{$pageData['getRawUrl']}}" id="getRawUrl">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                @foreach($pageData['propsData']['th'] as $theader)
                                    <th>{{ucwords(str_replace('_',' ', $theader))}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pageData['propsData']['tdata'] as  $tableData)
                                <tr class="gradeA">
                                    @php
                                    @$i = 0;
                                    @endphp
                                    @foreach($tableData as $index=>$data)
                                        @if($i == 0 )
                                            <td><input type="checkbox" class="i-checks" value="" name="input[]"></td>
                                        @else
                                            <td class="center">{{$data}}</td>
                                        @endif
                                    @php $i++; @endphp
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                @foreach($pageData['propsData']['th'] as $theader)
                                    <th>{{ucwords(str_replace('_',' ', $theader))}}</th>
                                @endforeach
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@foreach($pageData['content'] as $index=>$page)
    @include($pageData['modal'], array('content'=>$page,'action'=>$index)
   )
@endforeach

<script src="{{asset('public/js/ajaxFormSubmit.js')}}"></script>
