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
                        <header>Meus Dados</header>
                    </div>
                    <br>
                    <div class="col-md-12">

                        <!-- BEGIN CONTACTS COMMON DETAILS -->
                        <div class="hbox-column col-md-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4>Dados Pessoais</h4>
                                    <br/>
                                    <dl class="dl-horizontal dl-icon">
                                        <dt><span class="fa fa-fw fa-user fa-lg opacity-50"></span></dt>
                                        <dd>
                                            <span class="opacity-50">Nome</span><br/>
                                            <span class="text-medium">{{ $meusDados->nome }}</span>
                                        </dd>
                                        <dt><span class="fa fa-fw fa-gift fa-lg opacity-50"></span></dt>
                                        <dd>
                                            <span class="opacity-50">Aniversário</span><br/>
                                            <span class="text-medium">{{ $meusDados->data_nascimento }}</span>
                                        </dd>
                                    </dl><!--end .dl-horizontal -->
                                    <br/>
                                    <h4>Dados de Contato</h4>
                                    <br/>
                                    <dl class="dl-horizontal dl-icon">
                                        <dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
                                        <dd>
                                            <span class="opacity-50">Telefone</span><br/>
                                            <span class="text-medium">{{ $meusDados->phone01 }}</span> &nbsp;<span class="opacity-50">Zap</span><br/>
                                            <span class="text-medium">{{ $meusDados->phone02 }}</span> &nbsp;<span class="opacity-50">mobile</span>
                                        </dd>
                                        <dt><span class="fa fa-fw fa-envelope-square fa-lg opacity-50"></span></dt>
                                        <dd>
                                            <span class="opacity-50">Email</span><br/>
                                            <a class="text-medium">{{ $meusDados->email }}</a>
                                        </dd>
                                        <dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
                                        <dd>
                                            <span class="opacity-50">Endereço</span><br/>
                                            <span class="text-medium">
														{{ $meusDados->logradouro }}<br/>
                                                        {{ $meusDados->complemento }}<br/>
                                                        <span class="opacity-50">Numero: </span> {{ $meusDados->numero_casa }}<br/>
                                                        CEP: {{ $meusDados->cep }}<br/>
                                                        {{ $meusDados->bairro }}
                                            </span>
                                        </dd>

                                        <br/>
                                        <h4>Dados da Conta</h4>
                                        <br/>
                                        <dl class="dl-horizontal dl-icon">
                                            <dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
                                            <dd>
                                                <span class="opacity-50">Login</span><br/>
                                                <span class="text-medium">{{ $meusDados->login }}</span> &nbsp;<br/>
                                            </dd>
                                            <dt><span class="fa fa-fw fa-envelope-square fa-lg opacity-50"></span></dt>
                                            <dd>
                                                <span class="opacity-50">Nome do Plano</span><br/>
                                                <a class="text-medium">{{ $meusDados->mkProfile->descricao }}</a>
                                            </dd>
                                            <dt><span class="fa fa-money fa-lg opacity-50"></span></dt>
                                            <dd>
                                                <span class="opacity-50">Velocidade Contratada</span><br/>
                                                <span class="text-medium">
														{{ $meusDados->mkProfile->nome }}<br/>
                                                    <span class="opacity-50">Valor</span><br/>
                                                <span class="text-medium">
														{{ $meusDados->mkProfile->valor }}<br/>

                                            </span>
                                            </dd>
                                    </dl><!--end .dl-horizontal -->


                                </div><!--end .col -->
                            </div><!--end .row -->
                        </div><!--end .hbox-column -->
                        <!-- END CONTACTS COMMON DETAILS -->
                    </div><!--end .col -->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <ul class="list divider-full-bleed">




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