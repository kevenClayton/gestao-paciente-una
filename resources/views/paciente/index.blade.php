
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
            <div class="d-flex flex-column h-100 bg-light rounded-lg box-shadow-lg p-4">
                <div class="card mt-3">
                    <div class="card-body">
                        <x-alert />
                        <h2 class="text-center">Listagem de pacientes</h2>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Cpf</th>
                                        <th scope="col">Telefone/Celular</th>
                                        <th scope="col">Pai</th>
                                        <th scope="col">Mãe</th>
                                        <th scope="col">Naturalidade</th>
                                        <th scope="col">Nascimento</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{ dd($pacientes) }} --}}
                                        @foreach($pacientes as $paciente)
                                            <tr>
                                                <th scope="row">{{ $paciente->id_paciente        }}</th>
                                                <td><a href="{{ route('paciente.show', $paciente->id_paciente ) }}">{{  $paciente->nome_paciente        }}</a></td>
                                                <td>{{  $paciente->cpf_paciente        }}</a></td>
                                                <td>{{  $paciente->celular_paciente        }}</a></td>
                                                <td>{{  $paciente->nome_pai      }}</td>
                                                <td>{{  $paciente->nome_mae }}</td>
                                                <td>{{  $paciente->naturalidade_paciente           }}</td>
                                                <td>{{  $paciente->data_nascimento           }}</td>
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

@endsection

