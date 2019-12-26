
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
                                            @if ($row->pi_svet)
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
                                            <input type="number" step="1" title="Pi Svet" required="" class="form-control" name="pi_svet" id="pi_svet" value="{{$row->pi_svet}}">
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
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
