
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
                                    <h2 class="text-center">Listagem de usuários</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">E-mail</th>
                                                    <th scope="col">Cpf</th>
                                                    <th scope="col">Telefone</th>
                                                    <th scope="col">Celular</th>
                                                    <th scope="col">Perfil</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Ação</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{ dd($pacientes) }} --}}
                                                    {{-- {{ dd($pacientes) }} --}}
                                                    @foreach($usuarios as $usuario)
                                                        <tr>
                                                            <th scope="row">{{ $usuario->id }}</th>
                                                            <td><a href="{{ route('usuario.show', $usuario->id_internacao ) }}" class="" > {{ Str::limit($usuario->nome_usuario, 30, '...')}} </a></td>
                                                            <td>{{ date('d-m-Y H:i:s', strtotime($usuario->created_at)) }}</td>
                                                            <td>{{  $usuario->nome_setor         }}</td>
                                                            <td>

                                                                    @switch($usuario->id_status)
                                                                        @case(1)
                                                                            <div class="bg-faded-success text-success font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2 text-center">{{  $usuario->nome_status }}</div>
                                                                            @break
                                                                        @case(2)
                                                                            <div class="bg-faded-danger text-danger font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2 text-center">{{  $usuario->nome_status }}</div>
                                                                            @break
                                                                        @case(3)
                                                                            <div class="bg-faded-warning text-warning font-size-xs font-weight-medium py-1 px-3 rounded-sm my-1 mr-2 text-center">{{  $usuario->nome_status }}</div>
                                                                            @break
                                                                        @default

                                                                    @endswitch

                                                            </td>
                                                            <td><a href="{{ route('internacao.dadosClinicos',['idInternacao'=> $usuario->id_internacao]) }}" class="btn btn-sm btn-primary"><i class="mr-1 fe-activity"></i>Dados clinícos</a></td>
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





