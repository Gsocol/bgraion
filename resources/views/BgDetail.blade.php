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
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <strong>Наименование городского округа, муниципального района</strong>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-8 invoice-col">
                                        {{$row->name_raion}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <strong>Наименование муниципального образования</strong>
                                    </div>
                                    <div class="col-sm-8 invoice-col">
                                        {{$row->name_mo}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <strong>Наименование населенного пункта</strong>
                                    </div>
                                    <div class="col-sm-8 invoice-col">
                                        {{$row->name_np}}
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2primary">
                                <div class="callout callout-success">
                                    <h4 class="text-center">Общая информация об учреждении</h4>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Полное наименование учреждения</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->naim_full}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Сокращенное наименование учреждения</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->naim_sokr}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Юридический адрес учреждения</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->ur_adres}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Фактический адрес учреждения</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->fact_adres}}
                                    </div>

                                </div>
                                <hr class="style13">

                                 <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>ОГРН</strong>
                                    </div>
                                    <div class="col-sm-3 invoice-col">
                                        {{$row->ogrn}}
                                    </div>
                                    <div class="col-sm-3 invoice-col">
                                        <strong>дата присвоения ОГРН</strong>
                                    </div>
                                    <div class="col-sm-3 invoice-col">
                                        {{date('d-m-Y', strtotime($row->data_ogrn))}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>ИНН</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->inn}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>КПП</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->kpp}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>ОКПО</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->okpo}}
                                    </div>
                                    <div class="col-sm-2 invoice-col text-danger">
                                        <strong>Количество строений</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->kol_stroen}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Телефон</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        8({{$row->kod_telef}}){{$row->telef}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Факс</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        8({{$row->kod_faks}}){{$row->faks}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>E-mail</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->email}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Адрес сайта</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->site}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>ФИО руководителя</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->fio_rukovod}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Должность руководителя</strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        {{$row->dolg_rukovod}}
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
                                                <i class="fa fa-check-square-o"></i>
                                           @else
                                                <i class="fa fa-square-o"></i>
                                           @endif
                                            <strong>Секторная</strong><br>
                                            @if ($row->vk_kupol=="Да")
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                            <strong>Купольная</strong><br>
                                            @if ($row->vk_uprav=="Да")
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                            <strong>Поворотная (управляемая)</strong>
                                        <br>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center bg-success">
                                        <div >
                                        <strong>Типы установленных видеокамер на объекте</strong><br><br>
                                            @if ($row->vk_narush=="Да")
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                            <strong>Наружные</strong><br><br>
                                            @if ($row->vk_vnutr=="Да")
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                            <strong>Внутри помещений</strong><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center bg-success">
                                        <div>
                                        <strong>Классификация по типу оборудования</strong><br><br>
                                            @if ($row->vk_analog=="Да")
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                                <strong>Аналоговая</strong>
                                            <br><br>
                                            @if ($row->vk_cifr=="Да")
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                                <strong>Цифровая</strong>
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
                                        {{$row->kol_vk_narush}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Из них:  Наружных</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        {{$row->kol_vk_vnutr}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Внутренних</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        {{$row->kol_vk_vsego}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12 invoice-col">
                                        <div class="text-center"> <strong>Перечень моделей камер и их количество (все модели) </strong></div>
                                        <br>
                                        {{$row->opis_videokamer}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3 invoice-col">
                                        <strong>Модель сервера видеозаписи (видеорегстратора)</strong>
                                    </div>
                                    <div class="col-sm-9 invoice-col">
                                        {{$row->server_vk_nazv}}
                                    </div>
                                    </div>

                                <hr class="style13">
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-col">
                                    <strong>Наименование программного обеспечения видеосервера (видеорегстратора)</strong>
                                </div>
                                <div class="col-sm-9 invoice-col">
                                    {{$row->server_po}}
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
                                        <i class="fa fa-check-square-o"></i>
                                    @else
                                        <i class="fa fa-square-o"></i>
                                    @endif
                                </div>
                                <div class="col-sm-3 invoice-col text-center" >
                                    {{$row->dni_xranen}} (сут.)
                                </div>
                                <div class="col-sm-3 invoice-col text-center">
                                    @if ($row->is_udalen=="Да")
                                        <i class="fa fa-check-square-o"></i>
                                    @else
                                        <i class="fa fa-square-o"></i>
                                    @endif
                                </div>
                                <div class="col-sm-3 invoice-col text-center">
                                    @if ($row->is_internet=="Да")
                                        <i class="fa fa-check-square-o"></i>
                                    @else
                                        <i class="fa fa-square-o"></i>
                                    @endif
                                </div>
                            </div>
                            <hr class="style13">
                            <div class="row invoice-info">
                                <div class="col-sm-12 invoice-col">
                                    <div class="text-center"> <strong>Наименование оператора связи и его ИНН, номер, дата договора, скорость доступа</strong></div>
                                    <br>
                                    {{$row->dogovor_internet}}
                                </div>
                            </div>
                            <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Наличие метеллодетектора</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col" >
                                        @if ($row->is_metal_detekt=="Да")
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Количество</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        {{$row->kol_metal_detekt}}
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        <strong>Тревожная кнопка</strong>
                                    </div>
                                    <div class="col-sm-2 invoice-col">
                                        @if ($row->is_knopka=="Да")
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
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
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12 invoice-col">
                                        <div class="text-center"> <strong>Примечание (дополнительная информация)</strong></div>
                                        <br>
                                        {{$row->video_primechan}}
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
                                    <div class="col-sm-1 bg-success">
                                        @if ($row->kol_m1)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                        <strong>М1-ТС не более 8 мест</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        {{$row->kol_m1}}
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        @if ($row->kol_m2)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                        <strong>N1-ТС с весом до 3.5 т.</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        {{$row->kol_m2}}
                                    </div>
                                </div>
                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-1 bg-success">
                                        @if ($row->kol_m3)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                        <strong>М1-ТС более 8 мест</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        {{$row->kol_m3}}
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        @if ($row->kol_m4)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                        <strong>N1-ТС с весом от 3.5 до 12 т.</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        {{$row->kol_m4}}
                                    </div>
                                </div>
                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-1 bg-success">
                                        @if ($row->kol_n1)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                        <strong>М1-ТС более 8 мест, до 5т.</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        {{$row->kol_n1}}
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        @if ($row->kol_n2)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                        <strong>N1-ТС с весом более 12 т.</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        {{$row->kol_n2}}
                                    </div>
                                </div>
                                <div class="row invoice-info row-flex-wrap row-flex">
                                    <div class="col-sm-1 bg-success">
                                        @if ($row->kol_n3)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                        <strong>М1-ТС более 8 мест, свыше 5т.</strong>
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                        {{$row->kol_n3}}
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                    </div>
                                    <div class="col-sm-4 bg-success">
                                    </div>
                                    <div class="col-sm-1 bg-success">
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-12  text-center">
                                        <strong>Модели транспортных средств</strong>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-12"><br>
                                        {{$row->model_ts}}
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
                                        {{$row->model_glonass}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3">
                                        <strong>Наименование программного обеспечения используемого
                                        для мониторинга ТС</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        {{$row->po_glonass}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3">
                                        <strong>Наименовние организации обслуживающей приборы ГЛОНАСС</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        {{$row->obslug_glonass}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-3">
                                        <strong>Наименование оператора связи, через которого передается
                                        мониторинговая информация</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        {{$row->oper_sv_glonass}}
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
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
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
                                         {{$row->ts_primech}}
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

                                        <div class="row invoice-info">
                                            <div class="col-sm-2  bg-success">
                                            <strong>Тепловой</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->ts_primech}}
                                            </div>
                                            <div class="col-sm-2   bg-success">
                                                @if ($row->pi_teplo)
                                                    <i class="fa fa-check-square-o"></i>
                                                @else
                                                    <i class="fa fa-square-o"></i>
                                                @endif
                                                <strong>Извещатель пламени</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->pi_teplo}}
                                            </div>
                                            <div class="col-sm-2  bg-success">
                                                @if ($row->pi_svet)
                                                    <i class="fa fa-check-square-o"></i>
                                                @else
                                                    <i class="fa fa-square-o"></i>
                                                @endif
                                             <strong>Световой</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->pi_svet}}
                                            </div>
                                        </div>
                                        <div class="row invoice-info">
                                            <div class="col-sm-2  bg-success">
                                                @if ($row->pi_dim)
                                                    <i class="fa fa-check-square-o"></i>
                                                @else
                                                    <i class="fa fa-square-o"></i>
                                                @endif
                                                <strong>Дымовой</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->pi_dim}}
                                            </div>
                                            <div class="col-sm-2   bg-success">
                                                @if ($row->pi_kombim)
                                                    <i class="fa fa-check-square-o"></i>
                                                @else
                                                    <i class="fa fa-square-o"></i>
                                                @endif
                                                <strong>Комбиниров.</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->pi_kombin}}
                                            </div>
                                            <div class="col-sm-2  bg-success">
                                                @if ($row->pi_ruchnoi)
                                                    <i class="fa fa-check-square-o"></i>
                                                @else
                                                    <i class="fa fa-square-o"></i>
                                                @endif
                                                <strong>Ручной</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->pi_ruchnoi}}
                                            </div>
                                        </div>
                                        <div class="row invoice-info">
                                            <div class="col-sm-2  bg-success">
                                                @if ($row->pi_gaz)
                                                    <i class="fa fa-check-square-o"></i>
                                                @else
                                                    <i class="fa fa-square-o"></i>
                                                @endif
                                                <strong>Газовый</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->pi_gaz}}
                                            </div>
                                            <div class="col-sm-2 bg-success">
                                                @if ($row->pi_ioniz)
                                                    <i class="fa fa-check-square-o"></i>
                                                @else
                                                    <i class="fa fa-square-o"></i>
                                                @endif
                                                <strong>Ионизационный</strong>
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">
                                                {{$row->pi_ioniz}}
                                            </div>
                                            <div class="col-sm-2  text-center bg-success">

                                            </div>
                                            <div class="col-sm-2  text-center bg-success">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4  text-center bg-success">
                                        <div class="row invoice-info">
                                        <strong><br>Способ передачи от СПС</strong>
                                           <div class="space"></div>
                                            @if ($row->is_pi_provod=='Да')
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                        Проводной
                                            <div class="space"></div>
                                            @if ($row->is_pi_besprovod=='Да')
                                                <i class="fa fa-check-square-o"></i>
                                            @else
                                                <i class="fa fa-square-o"></i>
                                            @endif
                                        Беспроводной
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
                                        {{$row->models_pi}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-4">
                                        <strong>Модель пульта пожарной сигнализации</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{$row->model_pult}}
                                    </div>
                                </div>
                                <hr class="style13">
                                <div class="row invoice-info">
                                    <div class="col-sm-4">
                                        <strong>Наличие проекта пожарной сигнализации</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @if ($row->is_proekt_ps=='Да')
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
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
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-square-o"></i>
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
                                        {{$row->ps_primech}}
                                    </div>
                                </div>









                            </div><!-- tab 5 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- /.box -->
@endsection

