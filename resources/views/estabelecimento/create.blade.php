@extends('master.master')
@push('scripts-bottom')
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
                    <h2>Cadastro de estabelecimento</h2>
                    <form class="needsvalidate novalidate" method="POST" action="{{ route('estabelecimento.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="nome_estabelecimento">Nome estabelecimento: </label>
                            <input type="text" class="form-control"  name="nome_estabelecimento"  placeholder="Digite o nome do estabelecimento" required>
                        </div>
                            <div class="form-group">
                            <label for="tipo_estabelecimento ">Tipo: </label>
                            <select name="id_tipo_estabelecimento" class="form-control">
                                @foreach($tipoEstabelecimento as $estabelecimento)
                                    <option value="{{ $estabelecimento->id_tipo_estabelecimento }}">{{ $estabelecimento->nome_tipo_estab }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


