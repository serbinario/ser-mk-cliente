@extends('layouts.menu')
@section("css")
    <style type="text/css">
        .carregamento{
            display:    none;
            position:   fixed;
            z-index:    1000000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 )
            url("{{ asset('/img/pre-loader/load.gif') }}")
            50% 50%
            no-repeat;
        }
    </style>
@stop

@section('content')


    <!-- BEGIN HORIZONTAL FORM -->
    <div class="row">
        <div class="col-lg-12">
            <form method="GET" action="#" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <div class="card">
                    <div class="card-head style-default-light">
                        <header>Faturas Aberto</header>
                    </div>

                    <br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <ul class="list divider-full-bleed">

                                    <li class="tile">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="default-bright">
                                                    <div class="card-head text-center">VALOR</div>

                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="style-default-bright">
                                                    <div class="card-head">VENCIMENTO</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="style-default-bright">
                                                    <div class="card-head">SATATUS</div>
                                                </div>
                                            </div>
                                        </div><!--end .row -->
                                    </li>

                                </ul>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <ul class="list divider-full-bleed">

                                    @foreach ($debitos as $debito)
                                        <a target="_blank" class="tile-content ink-reaction" href="{{ $debito->link }}">
                                            <li class="tile">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <div class="default-bright">
                                                            <div class="card-head text-center">R$ {{ $debito->valor_debito }}</div>

                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="style-default-bright">
                                                            <div class="card-head">{{ $debito->data_vencimento }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="style-default-bright">
                                                            <div class="card-head">{{ $debito->status }}</div>
                                                        </div>
                                                    </div>
                                                </div><!--end .row -->
                                            </li>
                                        </a>

                                    @endforeach


                                </ul>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->

                </div><!--end .card -->

                <div class="card">
                    <div class="card-head style-default-light">
                        <header>Últimas Faturas</header>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <ul class="list divider-full-bleed">

                                    <li class="tile">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="default-bright">
                                                    <div class="card-head text-center">VALOR</div>

                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="style-default-bright">
                                                    <div class="card-head">VENCIMENTO</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="style-default-bright">
                                                    <div class="card-head">SATATUS</div>
                                                </div>
                                            </div>
                                        </div><!--end .row -->
                                    </li>

                                </ul>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <ul class="list divider-full-bleed">

                                    @foreach ($debitosPago as $debitoPago)
                                        <a target="_blank" class="tile-content ink-reaction" href="{{ $debitoPago->link }}">
                                            <li class="tile">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <div class="default-bright">
                                                            <div class="card-head text-center">R$ {{ $debitoPago->valor_debito }}</div>

                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="style-default-bright">
                                                            <div class="card-head">{{ $debitoPago->data_vencimento }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="style-default-bright">
                                                            <div class="card-head">{{ $debitoPago->status }}</div>
                                                        </div>
                                                    </div>
                                                </div><!--end .row -->
                                            </li>
                                        </a>

                                    @endforeach


                                </ul>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->

                </div><!--end .card -->

            </form>
        </div><!--end .col -->
    </div><!--end .row -->
    <!-- END HORIZONTAL FORM -->


@endsection

@section('javascript')

@stop