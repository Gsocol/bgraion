<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
    <!-- Your custom  HTML goes here -->



    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab_1" data-toggle="tab">Образование</a></li>
            <li><a href="#tab_2" data-toggle="tab">Медицина</a></li>
            <li><a href="#tab_3" data-toggle="tab">Администрация</a></li>
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Учреждение</th>
                                <th>ОГРН</th>
                                <th>ИНН</th>
                                <th>КПП</th>
                                <th>Действия</th>
                            </tr>
                            @foreach($result as $row)
                                <tr>
                                    <td>{{$row->naim_sokr}}</td>
                                    <td>{{$row->name_raion}}</td>
                                    <td>{{$row->inn}}</td>
                                    <td>{{$row->kpp}}</td>
                                    <td>
                                        <!-- To make sure we have read access, wee need to validate the privilege -->
                                        @if(CRUDBooster::isView() && $button_edit)
                                            <a class='btn btn-xs btn-primary btn-detail' href='{{CRUDBooster::mainpath("detail/$row->id")}}'><i class="fa fa-eye"></i></a>

                                        @endif
                                        @if(CRUDBooster::isUpdate() && $button_edit)
                                            <a class='btn btn-xs btn-success btn-edit' href='{{CRUDBooster::mainpath("edit/$row->id")}}'><i class="fa fa-pencil"></i></a>
                                        @endif

                                        @if(CRUDBooster::isDelete() && $button_edit)
                                            <a class='btn btn-xs btn-warning btn-delete' href='{{CRUDBooster::mainpath("delete/$row->id")}}'><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody></table>
                        <!-- ADD A PAGINATION -->
                        <p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>
                    </div>
                    <!-- /.box-body -->
                </div>

            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Учреждение</th>
                            <th>ОГРН</th>
                            <th>ИНН</th>
                            <th>КПП</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($result2 as $row)
                            <tr>
                                <td>{{$row->naim_sokr}}</td>
                                <td>{{$row->name_raion}}</td>
                                <td>{{$row->inn}}</td>
                                <td>{{$row->kpp}}</td>
                                <td>
                                    <!-- To make sure we have read access, wee need to validate the privilege -->
                                    @if(CRUDBooster::isView() && $button_edit)
                                        <a class='btn btn-xs btn-primary btn-detail' href='{{CRUDBooster::mainpath("detail/$row->id")}}'><i class="fa fa-eye"></i></a>

                                    @endif
                                    @if(CRUDBooster::isUpdate() && $button_edit)
                                        <a class='btn btn-xs btn-success btn-edit' href='{{CRUDBooster::mainpath("edit/$row->id")}}'><i class="fa fa-pencil"></i></a>
                                    @endif

                                    @if(CRUDBooster::isDelete() && $button_edit)
                                        <a class='btn btn-xs btn-warning btn-delete' href='{{CRUDBooster::mainpath("delete/$row->id")}}'><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody></table>
                    <!-- ADD A PAGINATION -->
                    <p>{!! urldecode(str_replace("/?","?",$result2->appends(Request::all())->render())) !!}</p>
                </div>
                <!-- /.box-body -->
            </div>


            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Учреждение</th>
                            <th>ОГРН</th>
                            <th>ИНН</th>
                            <th>КПП</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($result3 as $row)
                            <tr>
                                <td>{{$row->naim_sokr}}</td>
                                <td>{{$row->name_raion}}</td>
                                <td>{{$row->inn}}</td>
                                <td>{{$row->kpp}}</td>
                                <td>
                                    <!-- To make sure we have read access, wee need to validate the privilege -->
                                    @if(CRUDBooster::isView() && $button_edit)
                                        <a class='btn btn-xs btn-primary btn-detail' href='{{CRUDBooster::mainpath("detail/$row->id")}}'><i class="fa fa-eye"></i></a>

                                    @endif
                                    @if(CRUDBooster::isUpdate() && $button_edit)
                                        <a class='btn btn-xs btn-success btn-edit' href='{{CRUDBooster::mainpath("edit/$row->id")}}'><i class="fa fa-pencil"></i></a>
                                    @endif

                                    @if(CRUDBooster::isDelete() && $button_edit)
                                        <a class='btn btn-xs btn-warning btn-delete' href='{{CRUDBooster::mainpath("delete/$row->id")}}'><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody></table>
                    <!-- ADD A PAGINATION -->
                    <p>{!! urldecode(str_replace("/?","?",$result3->appends(Request::all())->render())) !!}</p>
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
@push('bottom')
        <script type="text/javascript">
        $(function() {
                       $('a[data-toggle="tab"]').on('click', function(e) {
                        window.localStorage.setItem('activeTab', $(e.target).attr('href'));
                      });
        var activeTab = window.localStorage.getItem('activeTab');
        if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
        //window.localStorage.removeItem("activeTab");
                        }
                      });
    </script>
@endpush
        <!-- /.box -->
@endsection

