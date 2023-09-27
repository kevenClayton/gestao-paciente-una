
@extends('master.master')
@section('title', env('APP_NAME'))
@section('description', '')
@section('content')
    <div class="container-fluid bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px;">
        <div class="row">
            <!-- Sidebar-->
            @include('includes.sidebar')
            <!-- Content-->
            <div class="col-lg-9">
                <div class="d-flex flex-column h-100 bg-light rounded-lg box-shadow-lg p-4">
                    <div class="py-2 p-md-3">
                        <div class="d-sm-flex align-items-center justify-content-between pb-2">
                            <h1 class="h3 mb-3 text-center text-sm-left"><span class="font-weight-light">Dados clínicos </span>{{ $internacao[0]->nome_paciente }}</h1>
                            <a href="{{ route('internacao.dadosClinicos.create',['idInternacao' => $internacao[0]->id_internacao]) }}" class="btn btn-primary btn-sm"><i class="fe-plus-circle mr-1"></i>Adicionar dados clinícos</a>
                        </div>
                        <div class="accordion" id="orders-accordion">
                            @foreach($dadosClinicos as $dadosClinico)

                                <div class="card">
                                    <div class="card-header">
                                        <div class="accordion-heading">
                                            <a class="collapsed d-flex flex-wrap align-items-center justify-content-between pr-4"
                                                href="#internacao-{{ $dadosClinico->id_dados_clinicos}}" role="button" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="internacao-{{ $dadosClinico->id_dados_clinicos}}">
                                                <div class="font-size-sm font-weight-medium text-nowrap my-1 mr-2">
                                                    <i class="fe-hash font-size-base mr-1"></i>
                                                    <span class="d-inline-block align-middle">{{ $dadosClinico->id_dados_clinicos}}</span>
                                                </div>
                                                <div class="text-nowrap text-body font-size-sm font-weight-normal my-1 mr-2">
                                                    <i class="fe-clock text-muted mr-1 "></i>{{ date('d-m-Y', strtotime($dadosClinico->created_at)) }} - {{ date('H:i:s', strtotime($dadosClinico->created_at)) }}
                                                </div>
                                                <div class="text-body font-size-sm font-weight-medium my-1">PCR:  <strong>{{$dadosClinico->pcr}} </strong></div>
                                                <div class="text-body font-size-sm font-weight-medium my-1">
                                                    Temperatura: <strong>{{$dadosClinico->temperatura}}</strong>
                                                </div>

                                                <div class="text-body font-size-sm font-weight-medium my-1">Diurese:  <strong>{{$dadosClinico->diurese}}</strong></div>
                                                <div class="text-body font-size-sm font-weight-medium my-1">Lecócitos:  <strong>{{$dadosClinico->leucocitos}} </strong></div>
                                                <div class="bg-faded-danger text-danger font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2">
                                                    Internado
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="internacao-{{ $dadosClinico->id_dados_clinicos}}" data-parent="#orders-accordion">
                                        <div class="card-body pt-4 border-top bg-secondary">
                                            <!-- Item-->
                                            <div class="d-sm-flex justify-content-between mb-3 pb-1">
                                                <div class="font-size-sm text-center pt-2 mr-sm-3">
                                                    <div class="text-muted">Balanço hidríco:</div>
                                                    <div class="font-weight-medium">{{ $dadosClinico->balanco_hidrico}}</div>
                                                </div>
                                                <div class="font-size-sm text-center pt-2">
                                                    <div class="text-muted">Diurese:</div>
                                                    <div class="font-weight-medium">{{ $dadosClinico->diurese}}</div>
                                                </div>
                                                <div class="font-size-sm text-center pt-2">
                                                    <div class="text-muted">Dieta:</div>
                                                    <div class="font-weight-medium">{{ $dadosClinico->dieta}}</div>
                                                </div>
                                                <div class="font-size-sm text-center pt-2">
                                                    <div class="text-muted">Medicamentos em uso:</div>
                                                    <div class="font-weight-medium">{{ $dadosClinico->medicamentos_em_uso}}</div>
                                                </div>
                                                <div class="font-size-sm text-center pt-2">
                                                    <div class="text-muted">Plano terapêutico:</div>
                                                    <div class="font-weight-medium">{{ $dadosClinico->plano_terapeutico}}</div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center justify-content-between pt-3 border-top">
                                                <div class="font-size-sm my-2 mr-2"><span
                                                        class="text-muted mr-1">Observação:</span><span
                                                        class="font-weight-medium">{{ $dadosClinico->observacao}}</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                           @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts-top')
    @endpush
    @push('scripts-bottom')
    @endpush
@endsection





