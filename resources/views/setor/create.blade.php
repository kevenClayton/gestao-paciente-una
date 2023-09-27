@extends('master.master')
@push('scripts-bottom')
@section('title', env('APP_NAME'))
@section('description', '')
@endpush
@section('content')

<div class="container-fluid bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px;">
    <div class="row">
        <!-- Sidebar-->
        @include('includes.sidebar')
        <!-- Content-->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <x-alert />
                    <h2 class="text-center">Cadastro de setor</h2>
                    <form class="needsvalidate novalidate" method="POST" action="{{ route('setor.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="id_estab">Estabelecimento: </label>
                            <select name="id_estabelecimento" class="form-control">
                                @foreach($estabelecimentos as $estabelecimento)
                                    <option value="{{ $estabelecimento->id_estabelecimento }}">{{ $estabelecimento->nome_estabelecimento }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nome_estabelecimento">Nome setor: </label>
                            <input type="text" class="form-control"  name="nome_setor"  placeholder="Digite o nome do setor" required>
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
