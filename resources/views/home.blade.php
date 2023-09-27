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
                <div class="d-flex flex-column bg-secondary bg-light rounded-lg box-shadow-lg p-4">
                    {{-- <div class="card "> --}}
                        <div class="card-body">
                            <h1 class="text-left">{{ env('APP_NAME') }} </h1>
                            <h5 class="text-left text-muted border border-top-0 border-left-0 border-right-0 border-bottom font-weight-light">Melhore a gestão do seu paciente critíco</h5>
                            <h5 class="text-left text-muted font-weight-light">Sistema de gestão de paciente</h5>
                            <a class="btn btn-primary mb-2" href="{{ route('paciente.create') }}">Cadastrar paciente</a>
                            <a class="btn btn-primary mb-2" href="{{ route('paciente.index') }}">Listar paciente</a>
                            <a class="btn btn-primary mb-2" href="{{ route('internacao.create') }}">Cadastrar internação</a>
                            <a class="btn btn-primary mb-2" href="{{ route('internacao.index') }}">Listar internação</a>
                            <a class="btn btn-primary mb-2" href="{{ route('leitos.create') }}">Cadastrar leitos</a>
                            <a class="btn btn-primary mb-2" href="{{ route('leitos.index') }}">Listar leitos</a>
                            {{-- <a class="btn btn-primary mb-2" href="{{ route('dados-clinicos.create') }}">Cadastrar dados clinícos</a>
                            <a class="btn btn-primary mb-2" href="{{ route('dados-clinicos.index') }}">Listar dados clinícos</a> --}}
                            <a class="btn btn-primary mb-2" href="{{ route('estabelecimento.create') }}">Cadastrar estabelecimento</a>
                            <a class="btn btn-primary mb-2" href="{{ route('estabelecimento.index') }}">Listar estabelecimentos</a>
                            <a class="btn btn-primary mb-2" href="{{ route('usuario.create') }}">Cadastrar usuário</a>
                            <a class="btn btn-primary mb-2" href="{{ route('usuario.index') }}">Listar usuário</a>
                        </div>
                    {{-- </div> --}}
                  </div>
            </div>
        </div>
    </div>
    @push('scripts-top')
    @endpush
    @push('scripts-bottom')
    @endpush
@endsection
