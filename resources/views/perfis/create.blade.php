@extends('admin.master.master')
@push('scripts-bottom')
@section('title', env('APP_NAME'))
@section('description', '')
@endpush
@section('content')

<div class="container-fluid bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px;">
    <div class="row">
        <!-- Sidebar-->
        @include('admin.includes.sidebar')
        <!-- Content-->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <x-alert />
                    <h2 class="text-center font-weight-light mb-3">Alteração do perfil <span class="font-weight-bold">{{ $perfis->nome_perfil }}</span></h2>
                    <form class="needsvalidate novalidate row" method="POST" action="{{ route('setor.store')}}">
                        @csrf
                        <div class="col-md-2">
                            <h5>Paciente</h5>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="listarPaciente">
                                    <label class="custom-control-label" for="listarPaciente">Listar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="criarPaciente">
                                    <label class="custom-control-label" for="criarPaciente">Criar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="excluirPaciente">
                                    <label class="custom-control-label" for="excluirPaciente">Excluir</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editarPaciente">
                                    <label class="custom-control-label" for="editarPaciente">Editar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="verPaciente">
                                    <label class="custom-control-label" for="verPaciente">Ver</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h5>Internação</h5>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="listarInternacao">
                                    <label class="custom-control-label" for="listarInternacao">Listar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="criarInternacao">
                                    <label class="custom-control-label" for="criarInternacao">Criar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editarInternacao">
                                    <label class="custom-control-label" for="editarInternacao">Editar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="excluirInternacao">
                                    <label class="custom-control-label" for="excluirInternacao">Excluir</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="verInternacao">
                                    <label class="custom-control-label" for="verInternacao">Ver</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h5>Leito</h5>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="listarLeito">
                                    <label class="custom-control-label" for="listarLeito">Listar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="criarLeito">
                                    <label class="custom-control-label" for="criarLeito">Criar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editarLeito">
                                    <label class="custom-control-label" for="editarLeito">Editar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="excluirLeito">
                                    <label class="custom-control-label" for="excluirLeito">Excluir</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="verLeito">
                                    <label class="custom-control-label" for="verLeito">Ver</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h5>Setores</h5>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="listarSetores">
                                    <label class="custom-control-label" for="listarSetores">Listar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="criarSetores">
                                    <label class="custom-control-label" for="criarSetores">Criar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editarSetores">
                                    <label class="custom-control-label" for="editarSetores">Editar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="excluirSetores">
                                    <label class="custom-control-label" for="excluirSetores">Excluir</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="verSetores">
                                    <label class="custom-control-label" for="verSetores">Ver</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h5>Usuários</h5>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="listarUsuario">
                                    <label class="custom-control-label" for="listarUsuario">Listar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="criarUsuario">
                                    <label class="custom-control-label" for="criarUsuario">Criar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editarUsuario">
                                    <label class="custom-control-label" for="editarUsuario">Editar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="excluirUsuario">
                                    <label class="custom-control-label" for="excluirUsuario">Excluir</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="verUsuario">
                                    <label class="custom-control-label" for="verUsuario">Ver</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h5>Estabelecimento</h5>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" value="true" id="listarEstabelecimento">
                                    <label class="custom-control-label" for="listarEstabelecimento">Listar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="criarEstabelecimento">
                                    <label class="custom-control-label" for="criarEstabelecimento">Criar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editarEstabelecimento">
                                    <label class="custom-control-label" for="editarEstabelecimento">Editar</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="excluirEstabelecimento">
                                    <label class="custom-control-label" for="excluirEstabelecimento">Excluir</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="verEstabelecimento">
                                    <label class="custom-control-label" for="verEstabelecimento">Ver</label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
