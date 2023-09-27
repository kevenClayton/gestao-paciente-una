
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
                    <div class="col-lg-4">
                        <div class="card btn-translucent-warning">
                            <div class="card-body">
                              <p class="card-title h5 text-warning">Perfis</p>
                              <p class="card-text font-size-sm">Criação e edição de perfil de autoridade do sistema</p>
                              <a href="#" class="btn btn-sm btn-warning">Configurar</a>
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





