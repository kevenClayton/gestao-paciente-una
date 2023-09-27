
@extends('master.master')
@push('scripts-top')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push('scripts-bottom')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src = "https://npmcdn.com/flatpickr/dist/l10n/pt.js"> </script>
<script>
$('#date-choose').flatpickr({
    locale: "pt",
    dateFormat: "d-m-Y"
});
    $('#time-choose').flatpickr({
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true
});
</script>
@section('title', env('APP_NAME'))
@section('description', '')
<script src="/assets/cep/busca-cep.js"></script>
@endpush
@section('content')

<div class="container-fluid bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px;">
    <div class="row">
        <!-- Sidebar-->
        @include('includes.sidebar')
        <!-- Content-->
        <div class="col-lg-9">
            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="text-center">Cadastro de usuário</h2>
                    <form class="needs-validation novalidate" method="POST" action="{{ route('usuario.registrarUsuario')}}" novalidate>
                        <div class="card mt-3">
                            <x-alert />
                            <div class="card-body">
                                    <h2 class="text-muted h5">Dados cadastrais</h2>
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nome_paciente">Nome* : </label>
                                            <input type="text" class="form-control"  name="nome"  placeholder="Digite o nome do paciente" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label >Senha* : </label>
                                            <div class="input-group-overlay cs-password-toggle form-group">
                                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fe-lock"></i></span></div>
                                                <input class="form-control prepended-form-control" type="password" name="password" placeholder="Senha" required>
                                                <label class="cs-password-toggle-btn">
                                                    <input class="custom-control-input" type="checkbox">
                                                    <i class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Mostrar
                                                        senha</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >E-mail : </label>
                                            <input type="email" class="form-control" name="email"  placeholder="Digite o celular do paciente" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >Celular* : </label>
                                            <input type="text" class="form-control mask-cell" name="celular"  placeholder="Digite o celular do paciente" required>
                                        </div>
                                        <div class="form-group  col-md-3">
                                            <label >Telefone : </label>
                                            <input type="text" class="form-control mask-cell" name="telefone"  placeholder="Digite o telefone do paciente" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >CPF* : </label>
                                            <input type="text" class="form-control mask-doc" name="cpf"  placeholder="Digite o cpf do paciente">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label >Tipo de perfil* : </label>
                                            <select name="id_perfil" class="form-control" required>
                                                <option value="">Selecione o perfil</option>
                                                @foreach($perfis as $perfil)
                                                    <option value="{{ $perfil->id_perfil }}">{{ $perfil->nome_perfil }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label >Status* : </label>
                                            <select name="id_status" class="form-control" required>
                                                <option value="">Selecione o status</option>
                                                @foreach($statusPaciente as $status)
                                                    <option value="{{ $status->id }}">{{ $status->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                            </div>
                        </div>


                        <button type="submit" class="btn btn-success btn-block mt-3">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


