
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
                            <div class="d-flex align-items-center mb-3">
                                <label class="text-nowrap pr-1 mr-2 mb-0">Setor</label>
                                <select class="form-control custom-select custom-select-sm" name="setorFilter">
                                    <option value="0">Todos</option>
                                    @foreach ($setores as $setor)
                                            <option value="{{  $setor->id_setor }}">{{  $setor->nome_setor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <x-alert />
                                    <h2 class="text-center">Listagem de internação</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Data internação</th>
                                                    <th scope="col">Setor</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Ação</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{ dd($pacientes) }} --}}
                                                    {{-- {{ dd($pacientes) }} --}}
                                                    @foreach($pacientes as $paciente)
                                                        <tr class="internacao" data-codigoestabelecimento="{{$paciente->id_estabelecimento}}" data-codigosetor="{{$paciente->id_setor}}">
                                                            <th scope="row">{{ $paciente->id_internacao        }}</th>
                                                            <td><a href="{{ route('paciente.show', $paciente->id_internacao ) }}" class="" > {{ Str::limit($paciente->nome_paciente, 30, '...')}} </a></td>
                                                            <td>{{ date('d-m-Y H:i:s', strtotime($paciente->data_internacao)) }}</td>
                                                            <td>{{  $paciente->nome_setor         }}</td>
                                                            <td>

                                                                    @switch($paciente->id_status)
                                                                        @case(1)
                                                                            <div class="bg-faded-success text-success font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2 text-center">{{  $paciente->nome_status }}</div>
                                                                            @break
                                                                        @case(2)
                                                                            <div class="bg-faded-danger text-danger font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2 text-center">{{  $paciente->nome_status }}</div>
                                                                            @break
                                                                        @case(3)
                                                                            <div class="bg-faded-warning text-warning font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2 text-center">{{  $paciente->nome_status }}</div>
                                                                            @break
                                                                        @case(3)
                                                                            <div class="bg-faded-success text-success font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2 text-center">{{  $paciente->nome_status }}</div>
                                                                            @break
                                                                        @default

                                                                    @endswitch

                                                            </td>
                                                            <td><a href="{{ route('internacao.dadosClinicos',['idInternacao'=> $paciente->id_internacao]) }}" class="btn btn-sm btn-primary"><i class="mr-1 fe-activity"></i>Dados clinícos</a></td>
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
        </div>
    </div>
    @push('scripts-top')
    @endpush
    @push('scripts-bottom')
        <script src="/assets/internacao/index.js"></script>
    @endpush
@endsection





