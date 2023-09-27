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
                    <div class="card mt-3">
                        <div class="card-body">
                            <x-alert />
                            <h2 class="text-center">Listagem de dados clinícos</h2>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Tipo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ dd($pacientes) }} --}}
                                            @foreach($estabelecimentos as $estabelecimento)
                                                <tr>
                                                    <th scope="row">{{ $estabelecimento->id_tipo_estabelecimento        }}</th>
                                                    <td>{{$estabelecimento->nome_estabelecimento}}</td>
                                                    <td>{{$estabelecimento->nome_tipo_estab}}</td>
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
    </div>
    @push('scripts-top')
    @endpush
    @push('scripts-bottom')
    @endpush
@endsection








