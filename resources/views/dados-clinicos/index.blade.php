
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
                                            <th scope="col">Leucocitos</th>
                                            <th scope="col">Pcr</th>
                                            <th scope="col">Temperatura</th>
                                            <th scope="col">Balanço hidríco</th>
                                            <th scope="col">Diurese</th>
                                            <th scope="col">Dieta</th>
                                            <th scope="col">Medic. em uso</th>
                                            <th scope="col">Plano terap.</th>
                                            <th scope="col">Observação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ dd($pacientes) }} --}}
                                            @foreach($dadosClinicos as $dadosClinico)
                                                <tr>
                                                    <th scope="row">{{ $dadosClinico->id_dados_clinicos        }}</th>
                                                    <td>{{  $dadosClinico->leucocitos          }}</td>
                                                    <td>{{  $dadosClinico->pcr                 }}</td>
                                                    <td>{{  $dadosClinico->temperatura         }}</td>
                                                    <td>{{  $dadosClinico->balanco_hidrico     }}</td>
                                                    <td>{{  $dadosClinico->diurese             }}</td>
                                                    <td>{{  $dadosClinico->dieta               }}</td>
                                                    <td>{{  $dadosClinico->medicamentos_em_uso }}</td>
                                                    <td>{{  $dadosClinico->plano_terapeutico   }}</td>
                                                    <td>{{  $dadosClinico->observacao          }}</td>
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
        <script src="/assets/internacao/index.js"></script>
    @endpush
@endsection





