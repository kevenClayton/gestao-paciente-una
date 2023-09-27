
@extends('master.master')
@push('scripts-bottom')
    <script src="/assets/internacao/create.js"></script>
@endpush
@section('title', env('APP_NAME'))
@section('description', '')
@section('content')
<div class="container-fluid bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px;">
    <div class="row">
        <!-- Sidebar-->
        @include('includes.sidebar')
        <!-- Content-->
        <div class="col-lg-9">
            <div class="card mt-3">
                <div class="card-body">
                    <x-alert />
                    <h2>Cadastro de leito</h2>
                    <form class="needs-validation novalidate" method="POST" action="{{ route('leitos.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="nome_leito">Estabelecimento: </label>
                            <select name="id_estabelecimento" class="form-control" required>
                                <option value="">Selecione o estabelecimento</option>
                                @foreach($estabelecimentos as $estabelecimento)
                                    <option value="{{ $estabelecimento->id_estabelecimento }}">{{ $estabelecimento->nome_estabelecimento }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group setor" >
                            <label for="id_setor">Setor: </label>
                            <select name="id_setor" class="form-control" required>
                                <option value="">Selecione primeiro o estabelecimento</option>
                                {{-- @foreach($setores as $setor)
                                    <option value="{{ $setor->id_setor }}">{{ $setor->nome_setor }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nome do leito: </label>
                            <input type="text" placeholder="Digite o nome do leito" class="form-control" name="nome_leito" required >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


