@extends('master.master')
@push('scripts-bottom')
@endpush
@section('title', env('APP_NAME'))
@section('description', '')
@section('content')
    <div class="d-none d-md-block position-absolute w-50 h-100 bg-size-cover"
        style="top: 0; right: 0; background-image: url(img/login/background-login.jpg);"></div>
    <!-- Actual content-->
    <section class="container d-flex align-items-center pt-7 pb-3 pb-md-4" style="flex: 1 0 auto;">
        <div class="w-100 pt-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 offset-lg-1">
                    <!-- Entrar view-->
                    <div class="cs-view show" id="signin-view">
                        <h1 class="h2">Entrar</h1>
                        <p class="font-size-ms text-muted mb-4">Entre com seu usuário e senha fornecido pelo administrador
                            do estabelecimento</p>
                        <form  action="{{ route('login.post') }}" class="needs-validation" novalidate  method="POST">
                            @csrf
                            <x-alert/>
                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                            class="fe-mail"></i></span></div>
                                <input class="form-control prepended-form-control" name="email" type="email" placeholder="Email" required>
                            </div>
                            <div class="input-group-overlay cs-password-toggle form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                            class="fe-lock"></i></span></div>
                                <input class="form-control prepended-form-control" type="password" name="password" placeholder="Senha"  required>
                                <label class="cs-password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox">
                                    <i class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Mostrar
                                        senha</span>
                                </label>
                            </div>
                            <div class="d-flex justify-content-between align-items-center form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="keep-signed-2">
                                    <label class="custom-control-label" for="keep-signed-2">Lembrar-me</label>
                                </div>
                                {{-- <a class="nav-link-style font-size-ms" href="password-recovery.html">Forgot password?</a> --}}
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Entrar</button>
                            <p class="font-size-sm pt-3 mb-0">Não tem conta ? <a href='#' class='font-weight-medium'
                                    data-view='#signup-view'>Cadastrar</a></p>
                        </form>
                    </div>
                    <!-- Cadastrar view-->
                    <div class="cs-view" id="signup-view">
                        <h1 class="h2">Cadastrar</h1>
                        <p class="font-size-ms text-muted mb-4">Faça seu cadastro e solicite ao administrador do
                            estabelecimento que o aprove</p>
                        <form class="needs-validation" novalidate>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nome completo" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email" required>
                            </div>
                            <div class="cs-password-toggle form-group">
                                <input class="form-control" type="password" placeholder="Senha" required>
                                <label class="cs-password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox"><i
                                        class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Mostrar
                                        senha</span>
                                </label>
                            </div>
                            <div class="cs-password-toggle form-group">
                                <input class="form-control" type="password" placeholder="Confirmar password" required>
                                <label class="cs-password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox"><i
                                        class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Mostrar
                                        senha</span>
                                </label>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
                            <p class="font-size-sm pt-3 mb-0">Já tem conta ? <a href='#' class='font-weight-medium'
                                    data-view='#signin-view'>Entrar</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
