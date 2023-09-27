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
                    <h2 class="text-center">Listagem de setores</h2>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Estabelecimento</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($setores as $setor)
                                <tr>
                                    <th scope="row">{{$setor->id_setor}}</th>
                                    <td>{{$setor->nome_setor}}</td>
                                    <td>{{$setor->nome_estabelecimento}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
