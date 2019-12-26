<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
    <!-- Your custom  HTML goes here -->

<!-- Убрать ненужные табы -->
<style>
    .panel.with-nav-tabs .panel-heading{
    padding: 5px 5px 0 5px;
    }
    .panel.with-nav-tabs .nav-tabs{
    border-bottom: none;
    }
    .panel.with-nav-tabs .nav-justified{
    margin-bottom: -1px;
    }
    /********************************************************************/
    /*** PANEL DEFAULT ***/
    .with-nav-tabs.panel-default .nav-tabs > li > a,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
    color: #777;
    }
    .with-nav-tabs.panel-default .nav-tabs > .open > a,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
    color: #777;
    background-color: #ddd;
    border-color: transparent;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
    color: #555;
    background-color: #fff;
    border-color: #ddd;
    border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #f5f5f5;
    border-color: #ddd;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #777;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #ddd;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #555;
    }
    /********************************************************************/
    /*** PANEL PRIMARY ***/
    .with-nav-tabs.panel-primary .nav-tabs > li > a,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
    }
    .with-nav-tabs.panel-primary .nav-tabs > .open > a,
    .with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
    background-color: #3071a9;
    border-color: transparent;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a,
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
    color: #428bca;
    background-color: #fff;
    border-color: #428bca;
    border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #428bca;
    border-color: #3071a9;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #fff;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #3071a9;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    background-color: #4a9fe9;
    }
    /********************************************************************/
    /*** PANEL SUCCESS ***/
    .with-nav-tabs.panel-success .nav-tabs > li > a,
    .with-nav-tabs.panel-success .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li > a:focus {
    color: #3c763d;
    }
    .with-nav-tabs.panel-success .nav-tabs > .open > a,
    .with-nav-tabs.panel-success .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-success .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li > a:focus {
    color: #3c763d;
    background-color: #d6e9c6;
    border-color: transparent;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.active > a,
    .with-nav-tabs.panel-success .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li.active > a:focus {
    color: #3c763d;
    background-color: #fff;
    border-color: #d6e9c6;
    border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #3c763d;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #d6e9c6;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #3c763d;
    }
    /********************************************************************/
    /*** PANEL INFO ***/
    .with-nav-tabs.panel-info .nav-tabs > li > a,
    .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
    color: #31708f;
    }
    .with-nav-tabs.panel-info .nav-tabs > .open > a,
    .with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
    color: #31708f;
    background-color: #bce8f1;
    border-color: transparent;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.active > a,
    .with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
    color: #31708f;
    background-color: #fff;
    border-color: #bce8f1;
    border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #d9edf7;
    border-color: #bce8f1;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #31708f;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #bce8f1;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #31708f;
    }
    /********************************************************************/
    /*** PANEL WARNING ***/
    .with-nav-tabs.panel-warning .nav-tabs > li > a,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
    color: #8a6d3b;
    }
    .with-nav-tabs.panel-warning .nav-tabs > .open > a,
    .with-nav-tabs.panel-warning .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
    color: #8a6d3b;
    background-color: #faebcc;
    border-color: transparent;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.active > a,
    .with-nav-tabs.panel-warning .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li.active > a:focus {
    color: #8a6d3b;
    background-color: #fff;
    border-color: #faebcc;
    border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #fcf8e3;
    border-color: #faebcc;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #8a6d3b;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #faebcc;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #8a6d3b;
    }
    /********************************************************************/
    /*** PANEL DANGER ***/
    .with-nav-tabs.panel-danger .nav-tabs > li > a,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
    color: #a94442;
    }
    .with-nav-tabs.panel-danger .nav-tabs > .open > a,
    .with-nav-tabs.panel-danger .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
    color: #a94442;
    background-color: #ebccd1;
    border-color: transparent;
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.active > a,
    .with-nav-tabs.panel-danger .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li.active > a:focus {
    color: #a94442;
    background-color: #fff;
    border-color: #ebccd1;
    border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #f2dede; /* bg color */
    border-color: #ebccd1; /* border color */
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #a94442; /* normal text color */
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #ebccd1; /* hover bg color */
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff; /* active text color */
    background-color: #a94442; /* active bg color */
    }

    hr.style13 {
        height: 10px;
        border: 0;
        box-shadow: 0 10px 10px -10px #8c8b8b inset;
    }
    .row-flex, .row-flex > div[class*='col-'] {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        flex:1 1 auto;
    }

    .row-flex-wrap {
        -webkit-flex-flow: row wrap;
        align-content: flex-start;
        flex:0;
    }

    .row-flex > div[class*='col-'] {
        margin:-.2px;
    }
    .space { margin:0; padding:0; height:30px; }
</style>
    @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
        @if(g('return_url'))
            <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                    &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
        @else


            <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}?r={{$nom_raion}}'><i class='fa fa-chevron-circle-left '></i>
                    &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
        @endif
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title !!}</strong>
        </div>

        <div class="panel-body" style="padding:20px 0px 0px 0px">
            <?php
            $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
            $return_url = ($return_url) ?: g('return_url');
            ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                    <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                    @if($hide_form)
                        <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                    @endif

        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <i class="fa fa-building-o"></i>
                    <h3 class="box-title">{{$row->naim_sokr}}</h3>
                </div>
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">Место расположения</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Общая информация</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">Видеонаблюдение</a></li>
                            <li><a href="#tab4primary" data-toggle="tab">Транспорт</a></li>
                            <li><a href="#tab5primary" data-toggle="tab">Противопожарная система</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1primary">
                                <div class="callout callout-success">
                                    <h4 class="text-center">Информация о месторасположении учреждения</h4>
                                </div>
                                <div class="form-group header-group-0 " id="form-group-name_raion" style="">
                                    <label class="control-label col-sm-3">Наименование городского округа, муниципального района<span class="text-danger" title="This field is required">*</span></label>

                                    <div class="col-sm-9">
                                        <input type="text" title="Наименование городского округа, муниципального района" required="" maxlength="255" class="form-control" name="name_raion" id="name_raion" value="{{$row->name_raion}}" disabled>
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>

                                    </div>
                                </div>
                                <div class="form-group header-group-0 " id="form-group-selsovet" style="">
                                    <label class="control-label col-sm-3">Наименование муниципального образования<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-9">
                                        <select style="width:100%" class="form-control" id="selsovet" required="" name="selsovet">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group header-group-0 " id="form-group-naspunkt" style="">
                                    <label class="control-label col-sm-3">Наименование муниципального образования<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-9">
                                        <select style="width:100%" class="form-control" id="naspunkt" required="" name="naspunkt">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2primary">
                                <div class="callout callout-success">
                                    <h4 class="text-center">Общая информация об учреждении</h4>
                                </div>



                                <div class="form-group header-group-0 " id="form-group-naim_full" style="">
                                    <label class="control-label col-sm-2">Полное наименование учреждения<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-4">
                                        <textarea name="naim_full" id="naim_full" required="" maxlength="5000" class="form-control" rows="5" style="margin: 0px 1.32813px 0px 0px">{{$row->naim_full}}</textarea>
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>

                                        <label class="control-label col-sm-2">Сокращенное наименование учреждения<span class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" title="Сокращенное наименование учреждения" required="" maxlength="255" class="form-control" name="naim_sokr" id="naim_sokr" value="{{$row->naim_sokr}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>
                                <hr class="style13">

                                <div class="form-group header-group-0 " id="form-group-ur_adres" style="">
                                    <label class="control-label col-sm-2">Юридический адрес учреждения<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" title="Юридический адрес учреждения" required="" maxlength="255" class="form-control" name="ur_adres" id="ur_adres" value="{{$row->ur_adres}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label col-sm-2">Фактический адрес учреждения<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" title="Фактический адрес учреждения" required="" maxlength="255" class="form-control" name="fact_adres" id="fact_adres" value="{{$row->fact_adres}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">

                                <div class="form-group header-group-0 " id="form-group-ogrn" style="">
                                    <label class="control-label col-sm-2">ОГРН<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" title="ОГРН" required="" maxlength="255" class="form-control" name="ogrn" id="ogrn" value="{{$row->ogrn}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>


                                        <label class="control-label col-sm-2">Дата присвоения ОГРН<span class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                                <input type="text" title="Дата присвоения ОГРН" readonly="" required="" class="form-control notfocus input_date" name="data_ogrn" id="data_ogrn"
                                                    value="{{date('d-m-Y', strtotime($row->data_ogrn))}}">
                                            </div>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>
                                <hr class="style13">

                                <div class="form-group header-group-0 " id="form-group-inn" style="">
                                    <label class="control-label col-sm-2">ИНН<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" title="ИНН" required="" maxlength="255" class="form-control" name="inn" id="inn" value="{{$row->inn}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                        <label class="control-label col-sm-2">КПП<span class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" title="КПП" required="" maxlength="255" class="form-control" name="kpp" id="kpp" value="{{$row->kpp}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>
                                <hr class="style13">


                                <div class="form-group header-group-0 " id="form-group-okpo" style="">
                                    <label class="control-label col-sm-2">ОКПО<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" title="ОКПО" required="" maxlength="255" class="form-control" name="okpo" id="okpo" value="{{$row->okpo}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                        <label class="control-label col-sm-2">Количество строений<span class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" step="1" title="Количество строений" required="" class="form-control" name="kol_stroen" id="kol_stroen" value="{{$row->kol_stroen}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>
                                <hr class="style13">
                                <div class="form-group header-group-0 " id="form-group-kod_telef" style="">
                                    <label class="control-label col-sm-2">Код<span class="text-danger" title="This field is required">*</span></label>
                                    <div class="col-sm-2">
                                        <input type="text" title="Код" required="" maxlength="255" class="form-control" name="kod_telef" id="kod_telef" value="{{$row->kod_telef}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                        <label class="control-label col-sm-1">Телефон<span class="text-danger" title="This field is required">*</span></label>

                                        <div class="col-sm-2">
                                            <input type="text" title="Телефон" required="" maxlength="255" class="form-control" name="telef" id="telef" value="{{$row->telef}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                        <label class="control-label col-sm-1">Факс<span class="text-danger" title="This field is required">*</span></label>

                                        <div class="col-sm-2">
                                            <input type="text" title="Факс" required="" maxlength="255" class="form-control" name="faks" id="faks" value="{{$row->faks}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>
                                <hr class="style13">
                                <div class="form-group header-group-0 " id="form-group-email" style="">
                                    <label class="control-label col-sm-2">Email<span class="text-danger" title="This field is required">*</span></label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" title="Email" required="" placeholder="Пожалуйста, введите действительный адрес электронной почты " maxlength="255" class="form-control" name="email" id="email" value="{{$row->email}}">
                                        </div>
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                        <label class="control-label col-sm-2">Адрес сайта<span class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" title="Адрес сайта" required="" maxlength="255" class="form-control" name="site" id="site" value="{{$row->site}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>

                                <hr class="style13">

                                <div class="form-group header-group-0 " id="form-group-fio_rukovod" style="">
                                    <label class="control-label col-sm-2">ФИО руководителя<span class="text-danger" title="This field is required">*</span></label>

                                    <div class="col-sm-4">
                                        <input type="text" title="ФИО руководителя" required="" maxlength="255" class="form-control" name="fio_rukovod" id="fio_rukovod" value="{{$row->fio_rukovod}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                        <label class="control-label col-sm-2">Должность<span class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" title="Должность" required="" maxlength="255" class="form-control" name="dolg_rukovod" id="dolg_rukovod" value="{{$row->dolg_rukovod}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3primary">
                                <div class="callout callout-success">
                                    <h4 class="text-center">Информация о видеонаблюдении в учреждении</h4>
                                </div>
                                <div class="row invoice-info row-flex row-flex-wrap">
                                    <div class="col-sm-4 text-center bg-success">
                                        <div>
                                        <strong>Типы установленных видеокамер на объекте</strong><br><br>
                                           @if ($row->vk_sektor=="Да")
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_sektor" id="vk_sektor" value="vk_sektor" checked>
                                                        <strong>Секторная</strong>
                                                    </label>
                                                </div>
                                           @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_sektor" id="vk_sektor" value="vk_sektor">
                                                        <strong>Секторная</strong>
                                                    </label>
                                                </div>
                                           @endif
                                            @if ($row->vk_kupol=="Да")
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_kupol" id="vk_kupol" value="vk_kupol" checked>
                                                        <strong>Купольная</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_kupol" id="vk_kupol" value="vk_kupol">
                                                        <strong>Купольная</strong>
                                                    </label>
                                                </div>
                                            @endif
                                            @if ($row->vk_uprav=="Да")
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_uprav" id="vk_uprav" value="vk_uprav" checked>
                                                        <strong>Поворотная (управляемая)</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_uprav" id="vk_uprav" value="vk_uprav">
                                                        <strong>Поворотная (управляемая)</strong>
                                                    </label>
                                                </div>
                                            @endif
                                        <br>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center bg-success">
                                        <div >
                                        <strong>Типы установленных видеокамер на объекте</strong><br><br>
                                            @if ($row->vk_narush=="Да")
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_narush" id="vk_narush" value="vk_narush" checked>
                                                        <strong>Наружные</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_narush" id="vk_narush" value="vk_narush">
                                                        <strong>Наружные</strong>
                                                    </label>
                                                </div>
                                            @endif
                                            @if ($row->vk_vnutr=="Да")
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_vnutr" id="vk_vnutr" value="vk_vnutr" checked>
                                                        <strong>Внутри помещений</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_vnutr" id="vk_vnutr" value="vk_vnutr">
                                                        <strong>Внутри помещений</strong>
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center bg-success">
                                        <div>
                                        <strong>Классификация по типу оборудования</strong><br><br>
                                            @if ($row->vk_analog=="Да")
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_analog" id="vk_analog" value="vk_analog" checked>
                                                        <strong>Аналоговая</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_analog" id="vk_analog" value="vk_analog">
                                                        <strong>Аналоговая</strong>
                                                    </label>
                                                </div>
                                            @endif
                                            <br><br>
                                            @if ($row->vk_cifr=="Да")
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_cifr" id="vk_cifr" value="vk_cifr" checked>
                                                        <strong>Цифровая</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="vk_cifr" id="vk_cifr" value="vk_cifr">
                                                        <strong>Цифровая</strong>
                                                    </label>
                                                </div>
                                            @endif
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Всего камер на объекте</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                                <input type="number" step="1" title="Всего камер на объекте" required="" class="form-control" name="kol_vk_narush" id="kol_vk_narush" value="{{$row->kol_vk_narush}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Из них:  Наружных</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                            <input type="text" title="Наружных" required="" maxlength="255" class="form-control" name="kol_vk_vnutr" id="kol_vk_vnutr" value="{{$row->kol_vk_vnutr}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Внутренних</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                            <input type="number" step="1" title="Внутренних" required="" class="form-control" name="kol_vk_vsego" id="kol_vk_vsego" value="{{$row->kol_vk_vsego}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12 invoice-col">
                                        <div class="text-center"> <strong>Перечень моделей камер и их количество (все модели) </strong></div>
                                        <br>
                                    </div>
                                        <div class="col-sm-12">
                                            <textarea name="opis_videokamer" id="opis_videokamer" required="" maxlength="5000" class="form-control" rows="5">{{$row->opis_videokamer}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3 invoice-col">
                                        <strong>Модель сервера видеозаписи (видеорегистратора)</strong>
                                    </div>
                                    <div class="col-sm-9 invoice-col">
                                            <textarea name="server_vk_nazv" id="server_vk_nazv" required="" maxlength="5000" class="form-control" rows="5">{{$row->server_vk_nazv}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                    </div>

                                <hr class="style13">
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-col">
                                    <strong>Наименование программного обеспечения видеосервера (видеорегистратора)</strong>
                                </div>
                                <div class="col-sm-9 invoice-col">
                                        <textarea name="server_po" id="server_po" required="" maxlength="5000" class="form-control" rows="5">{{$row->server_po}}</textarea>
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                </div>
                            </div>
                            <hr class="style13">
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-col text-center">
                                    <strong>Наличие плана размещения камер на объекте</strong>
                                </div>
                                <div class="col-sm-3 invoice-col text-center" >
                                    <strong>Период хранения видеоданных (сут.)</strong>
                                </div>
                                <div class="col-sm-3 invoice-col text-center">
                                    <strong>Возможность удаленного подключения к серверу видеозаписи</strong>
                                </div>
                                <div class="col-sm-3 invoice-col text-center">
                                    <strong>Наличие доступа в интернет на объекте</strong>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-col text-center">
                                    @if ($row->is_plan_video=="Да")
                                        <div class="checkbox">
                                                <input type="checkbox" name="is_plan_video" id="is_plan_video" value="is_plan_video" checked>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <input type="checkbox" name="is_plan_video" id="is_plan_video" value="is_plan_video">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-3 invoice-col text-center" >
                                    <input type="number" step="1" title="Период хранения видеоданных (сут.)" required="" class="form-control" name="dni_xranen" id="dni_xranen" value="{{$row->dni_xranen}}">
                                </div>
                                <div class="col-sm-3 invoice-col text-center">
                                    @if ($row->is_udalen=="Да")
                                        <div class="checkbox">
                                            <input type="checkbox" name="is_udalen" id="is_udalen" value="is_udalen" checked>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <input type="checkbox" name="is_udalen" id="is_udalen" value="is_udalen">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-3 invoice-col text-center">
                                    @if ($row->is_internet=="Да")
                                        <div class="checkbox">
                                            <input type="checkbox" name="is_internet" id="is_internet" value="is_internet" checked>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <input type="checkbox" name="is_internet" id="is_internet" value="is_internet">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="style13">
                            <div class="row invoice-info">
                                <div class="col-sm-12 invoice-col">
                                    <div class="text-center"> <strong>Наименование оператора связи и его ИНН, номер, дата договора, скорость доступа</strong></div>
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="dogovor_internet" id="dogovor_internet" required="" maxlength="5000" class="form-control" rows="5">{{$row->dogovor_internet}}</textarea>
                                    <div class="text-danger"></div>
                                    <p class="help-block"></p>
                                </div>


                            </div>
                            <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Наличие метеллодетектора</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col" >
                                        @if ($row->is_metal_detekt=="Да")
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_metal_detekt" id="is_metal_detekt" value="is_metal_detekt" checked>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_metal_detekt" id="is_metal_detekt" value="is_metal_detekt">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Количество</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                            <input type="number" step="1" title="Количество" required="" class="form-control" name="kol_metal_detekt" id="kol_metal_detekt" value="{{$row->kol_metal_detekt}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Тревожная кнопка</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        @if ($row->is_knopka=="Да")
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_knopka" id="is_knopka" value="is_knopka" checked>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_knopka" id="is_knopka" value="is_knopka">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        <strong>Подключение сервера видеозаписи к аппратно-программному
                                        комплексу "Безопасный город" области или муниципального образования</strong>
                                    </div>
                                    <div class="col-sm-6 invoice-col" >
                                        @if ($row->is_bg=="Да")
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_bg" id="is_bg" value="is_bg" checked>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_bg" id="is_bg" value="is_bg">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12 invoice-col">
                                        <div class="text-center"> <strong>Примечание (дополнительная информация)</strong></div>
                                        <br>
                                    </div>

                                    <div class="col-sm-12">
                                        <textarea name="video_primech" id="video_primech" required="" maxlength="5000" class="form-control" rows="5">{{$row->video_primech}}</textarea>
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4primary">
                                <div class="callout callout-success">
                                    <h4 class="text-center">Информация о транспортных средствах в учреждении</h4>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-12  text-center bg-success">
                                        <strong><br>Категория транспортных средств<br></strong>
                                    </div>
                                </div>
                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-12 bg-success">
                                        <br>
                                    </div>
                                <div class="col-sm-3 bg-success">
                                    <strong>Всего транспортных средств в учреждении</strong>
                                </div>
                                    <div class="col-sm-3 bg-success">
                                        {{$row->kol_ts}}
                                    </div>
                                    <div class="col-sm-6 bg-success">
                                        <strong>Из них:</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-1 bg-success">
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        <strong>Кол-во:</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        <strong>Кол-во:</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-5 bg-success">
                                        @if ($row->kol_m1)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1" checked>
                                                    <strong>М1-ТС не более 8 мест</strong>
                                                </label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1">
                                                    <strong>М1-ТС не более 8 мест</strong>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                            <input type="number" step="1" title="M1" required="" class="form-control" name="kol_m1" id="kol_m1" value="{{$row->kol_m1}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                    <div class="col-sm-5 bg-success">
                                        @if ($row->kol_n1)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="check1" checked>
                                                        <strong>N1-ТС с весом до 3.5 т.</strong>
                                                    </label>
                                                </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1">
                                                    <strong>N1-ТС с весом до 3.5 т.</strong>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                            <div class="col-sm-1 bg-success">
                                                    <input type="number" step="1" title="N1" required="" class="form-control" name="kol_n1" id="kol_n1" value="{{$row->kol_n1}}">
                                                    <div class="text-danger"></div>
                                                    <p class="help-block"></p>
                                            </div>

                                </div>
                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-5 bg-success">
                                        @if ($row->kol_m2)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1" checked>
                                                    <strong>М2-ТС более 8 мест</strong>
                                                </label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1">
                                                    <strong>М2-ТС более 8 мест</strong>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        <input type="number" step="1" title="M2" required="" class="form-control" name="kol_m2" id="kol_m2" value="{{$row->kol_m2}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-sm-5 bg-success">
                                        @if ($row->kol_n2)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1" checked>
                                                    <strong>N2-ТС с весом от 3.5 до 12 т.</strong>
                                                </label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1">
                                                    <strong>N2-ТС с весом от 3.5 до 12 т.</strong>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        <input type="number" step="1" title="N2" required="" class="form-control" name="kol_n2" id="kol_n2" value="{{$row->kol_n2}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-5 bg-success">
                                        @if ($row->kol_m3)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1" checked>
                                                    <strong>М3-ТС более 8 мест, до 5т.</strong>
                                                </label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1">
                                                    <strong>М3-ТС более 8 мест, до 5т.</strong>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        <input type="number" step="1" title="M3" required="" class="form-control" name="kol_m3" id="kol_m3" value="{{$row->kol_m3}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-sm-5 bg-success">
                                        @if ($row->kol_n3)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1" checked>
                                                    <strong>N3-ТС с весом более 12 т.</strong>
                                                </label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1">
                                                    <strong>N3-ТС с весом более 12 т.</strong>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        <input type="number" step="1" title="N3" required="" class="form-control" name="kol_n3" id="kol_n3" value="{{$row->kol_n3}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-5 bg-success">
                                        @if ($row->kol_m4)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1" checked>
                                                    <strong>М4-ТС более 8 мест, свыше 5т.</strong>
                                                </label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="check1">
                                                    <strong>М4-ТС более 8 мест, свыше 5т.</strong>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        <input type="number" step="1" title="M3" required="" class="form-control" name="kol_m3" id="kol_m3" value="{{$row->kol_m3}}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-sm-6 bg-success">
                                    </div>
                                </div>
<!----  *************************            -->
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12  text-center">
                                        <strong>Модели транспортных средств</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-12"><br>
                                            <textarea name="model_ts" id="model_ts" required="" maxlength="5000" class="form-control" rows="5">{{$row->model_ts}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12  text-center">
                                        <strong>Модели приборов ГЛОНАСС</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-12"><br>
                                            <textarea name="model_glonass" id="model_glonass" required="" maxlength="5000" class="form-control" rows="5">{{$row->model_glonass}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3">
                                        <strong>Наименование программного обеспечения используемого
                                        для мониторинга ТС</strong>
                                    </div>
                                    <div class="col-sm-9">
                                            <input type="text" title="ПО ГЛОНАСС" required="" maxlength="255" class="form-control" name="po_glonass" id="po_glonass" value="{{$row->po_glonass}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3">
                                        <strong>Наименовние организации обслуживающей приборы ГЛОНАСС</strong>
                                    </div>
                                    <div class="col-sm-9">
                                            <input type="text" title="Обслуживание ГЛОНАСС" required="" maxlength="255" class="form-control" name="obslug_glonass" id="obslug_glonass" value="{{$row->obslug_glonass}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3">
                                        <strong>Наименование оператора связи, через которого передается
                                        мониторинговая информация</strong>
                                    </div>
                                    <div class="col-sm-9">
                                            <input type="text" title="Оператор связи" required="" maxlength="255" class="form-control" name="obslug_glonass" id="obslug_glonass" value="{{$row->oper_sv_glonass}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-9">
                                        <strong>Подключение сервера мониторинга ТС
                                        к аппаратно-программному комплексу "Безопасный город" области
                                        или муниципального образования</strong>
                                    </div>
                                    <div class="col-sm-3">
                                        @if ($row->is_glonass_bg=='Да')
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_glonass_bg" id="is_glonass_bg" value="is_glonass_bg" checked>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_glonass_bg" id="is_glonass_bg" value="is_glonass_bg">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12  text-center">
                                        <strong>Примечание (дополнительная информация)</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-12"><br>
                                            <textarea name="ts_primech" id="ts_primech" required="" maxlength="5000" class="form-control" rows="5">{{$row->ts_primech}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>

                                     </div>
                                </div>
                            </div>   <!-- tab 4 -->
                            <div class="tab-pane fade" id="tab5primary">
                                <div class="callout callout-success">
                                    <h4 class="text-center">Информация о противопожарной системе на объекте</h4>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-8  text-center bg-success">
                                        <strong><br>Типы пожарных извещателей<br></strong>
                                        <div class="row invoice-info">
                                            <div class="col-sm-2  text-center bg-success">
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                <strong>Кол-во:</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                <strong>Кол-во:</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                <strong>Кол-во:</strong>
                                            </div>
                                        </div>
   <!---  -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_teplo)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Тепловой</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Тепловой</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                <input type="number" step="1" title="Тепловой" required="" class="form-control" name="pi_teplo" id="pi_teplo" value="{{$row->pi_teplo}}">
                                                <div class="text-danger"></div>
                                                 <p class="help-block"></p>
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_plamya)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Извещатель пламени</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Извещатель пламени</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" step="1" title="Извещатель пламени" required="" class="form-control" name="pi_plamya" id="pi_plamya" value="{{$row->pi_plamya}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_svet)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Световой</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Световой</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" step="1" title="Световой" required="" class="form-control" name="pi_svet" id="pi_svet" value="{{$row->pi_svet}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="row invoice-info">
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_dim)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Дымовой</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Дымовой</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                <input type="number" step="1" title="Дымовой" required="" class="form-control" name="pi_dim" id="pi_teplo" value="{{$row->pi_dim}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_kombin)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Комбинированный</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Комбинированный</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" step="1" title="Комбинированный" required="" class="form-control" name="pi_kombin" id="pi_kombin" value="{{$row->pi_kombin}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_ruchnoi)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Ручной</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Ручной</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" step="1" title="Ручной" required="" class="form-control" name="pi_ruchnoi" id="pi_ruchnoi" value="{{$row->pi_ruchnoi}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>



                                        <div class="row invoice-info">
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_gaz)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Газовый</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Газовый</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                <input type="number" step="1" title="Газовый" required="" class="form-control" name="pi_gaz" id="pi_gaz" value="{{$row->pi_gaz}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_ioniz)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1" checked>
                                                            <strong>Ионизационный</strong>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="check1">
                                                            <strong>Ионизационный</strong>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" step="1" title="Ионизационный" required="" class="form-control" name="pi_ioniz" id="pi_ioniz" value="{{$row->pi_ioniz}}">
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-sm-4 bg-success">
                                            </div>
                                        </div>
                                        <!-- -->
                                    </div>
                                    <div class="col-sm-4  text-center bg-success">
                                        <div class="row invoice-info">
                                        <strong><br>Способ передачи от СПС</strong>
                                            <div class="col-sm-12"><br></div>
                                            <div class="col-sm-12">
                                            @if ($row->is_pi_provod=='Да')
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="check1" checked>
                                                        <strong>Проводной</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="check1">
                                                        <strong>Проводной</strong>
                                                    </label>
                                                </div>
                                            @endif
                                            </div>
                                            <div class="col-sm-12"><br></div>
                                            <div class="col-sm-12">
                                            @if ($row->is_pi_besprovod=='Да')
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="check1" checked>
                                                        <strong>Беспроводной</strong>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="check1">
                                                        <strong>Беспроводной</strong>
                                                    </label>
                                                </div>
                                            @endif
                                            </div>
                                            <div class="col-sm-12"><br></div>
                                            <div class="col-sm-12"><br></div>
                                            <div class="col-sm-12"><br></div>

                                        </div>
                                    </div>
                                </div>
                              <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12  text-center">
                                        <strong>Модели пожарных извещателей и их количество</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-12"><br>
                                            <textarea name="models_pi" id="models_pi" required="" maxlength="5000" class="form-control" rows="5">{{$row->models_pi}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-4">
                                        <strong>Модель пульта пожарной сигнализации</strong>
                                    </div>
                                    <div class="col-sm-8">
                                            <textarea name="model_pult" id="model_pult" required="" maxlength="5000" class="form-control" rows="5">{{$row->model_pult}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-4">
                                        <strong>Наличие проекта пожарной сигнализации</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @if ($row->is_proekt_ps=='Да')
                                            <div class="checkbox">
                                                    <input type="checkbox" name="is_proekt_ps" id="is_proekt_ps" value="is_proekt_ps" checked>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_proekt_ps" id="is_proekt_ps" value="is_proekt_ps">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-4">
                                        <strong>Выведена ли сигнализация в ЕДДС</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @if ($row->is_edds=='Да')
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_edds" id="is_edds" value="is_edds" checked>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_edds" id="is_edds" value="is_edds">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12  text-center">
                                        <strong>Примечание (дополнительная информация)</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-12"><br>
                                            <textarea name="ps_primech" id="ps_primech" required="" maxlength="5000" class="form-control" rows="5">{{$row->ps_primech}}</textarea>
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>

                                    </div>
                                </div>
                            </div><!-- tab 5 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <div class="box-footer" style="background: #fff9f8">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                    @if(g('return_url'))
                                        <a href='{{g("return_url")}}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                                    @else
                                        <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET))}}r={{$nom_raion}}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                                    @endif
                                @endif
                                @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                                    @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                                        <input type="submit" name="submit" value='{{trans("crudbooster.button_save_more")}}' class='btn btn-success'>
                                    @endif

                                    @if($button_save && $command != 'detail')
                                        <input type="submit" name="submit" value='{{trans("crudbooster.button_save")}}' class='btn btn-success'>
                                    @endif

                                @endif
                            </div>
                        </div>


                    </div><!-- /.box-footer-->
                </form>
        </div>
    </div>
    @push('bottom')

        <script src="http://apkbg/vendor/crudbooster/assets/adminlte/plugins/datepicker/locales/bootstrap-datepicker.ru.js" charset="UTF-8"></script>
        <script type="text/javascript">
            var lang = 'ru';
            $(function() {
                $('.input_date').datepicker({
//                    format: 'yyyy-mm-dd',
                    format: 'dd-mm-yyyy',
                    language: lang
                });

                $('.open-datetimepicker').click(function() {
                    $(this).next('.input_date').datepicker('show');
                });

            });

        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                //console.log('ФАякс - начало','{{CRUDBooster::mainpath()}}');

// Аякс запрос сельсоветов и установка нужного
                $.ajax({
                    type: 'get',
                    url: '{{CRUDBooster::mainpath()}}/selsovets/{{$nom_raion}}',
                    dataType: 'json',
                    async: false,
                    success: function (data) {
//                        console.log(data);
                        $.each(data, function(key, val){
                            $('#selsovet').append($("<option/>", {
                                value: val.id,
                                text: val.Name
                            }));
                        });
                        $("#selsovet :contains('{{$row->name_mo}}')").attr("selected", "selected");
                   //     nom_selsovet = $("#selsovet").val();
                        window.localStorage.setItem('nom_selsovet',$("#selsovet").val());
                    }
                });

                $.ajax({
                    type: 'get',
                    url: '{{CRUDBooster::mainpath()}}/naspunkts/'+ window.localStorage.getItem('nom_selsovet'),
                    dataType: 'json',
                    async: false,
                    success: function (data) {
                        console.log(data);
                        $.each(data, function(key, val){
                            $('#naspunkt').append($("<option/>", {
                                value: val.id,
                                text: val.sokr+' '+val.Name
                            }));
                        });
                        $("#naspunkt :contains('{{$row->name_np}}')").attr("selected", "selected");
                    }
                });



            });

            </script>
    @endpush



        <!-- /.box -->
@endsection

