<div class="col-lg-3 mb-4 mb-lg-0">
    <div class="bg-light rounded-lg box-shadow-lg">
      <div class="px-4 py-4 mb-1 text-center"><img class="d-block rounded-circle mx-auto my-2" width="110" src="/img/avatar/main.jpg" alt="Amanda Wilson">
        <h6 class="mb-0 pt-1">{{ auth()->user()->nome }}</h6>
        <span class="text-muted font-size-sm">{{ DB::table('perfis')->where('id_perfil', '=', auth()->user()->id_perfil)->value('nome_perfil')  }}</span>
      </div>
      <div class="px-4 pb-4 text-center d-lg-none "><a class="btn btn-primary px-5 mb-2" href="#account-menu" data-toggle="collapse" aria-expanded="true"><i class="fe-menu mr-2"></i>Expandir o menu</a></div>
      <div class="pb-2 collapse show" id="account-menu" style="">
        <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Página inicial</h3>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="fe-home font-size-lg opacity-60 mr-2"></i>Página inicial<span class="nav-indicator"></span>
        </a>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="fe-activity font-size-lg opacity-60 mr-2"></i>Dashboard<span class="nav-indicator"></span>
        </a>
        <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Paciente</h3>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 {{ Route::currentRouteName() == 'paciente.index' ? 'active' : ''}}" href="{{ route('paciente.index') }}">
            <i class="fe-users font-size-lg opacity-60 mr-2"></i>Listar<span class="nav-indicator"></span>
        </a>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top  {{ Route::currentRouteName() == 'paciente.create' ? 'active' : ''}}" href="{{ route('paciente.create') }}">
            <i class="fe-user-plus font-size-lg opacity-60 mr-2"></i>Cadastrar
        </a>
        {{-- <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top {{ Route::currentRouteName() == 'dados-clinicos' ? 'active': ''}}" href="{{ route('dados-clinicos.index') }}">
            <i class="fe-trending-up font-size-lg opacity-60 mr-2"></i>Dados clínicos<span class="nav-indicator"></span>
        </a> --}}
        <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Internação</h3>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 {{ Route::currentRouteName() == 'internacao.index' ? 'active' : ''}}" href="{{ route('internacao.index') }}">
            <i class="fe-clipboard font-size-lg opacity-60 mr-2"></i>Listar<span class="nav-indicator"></span>
        </a>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top  {{ Route::currentRouteName() == 'internacao.create' ? 'active' : ''}}" href="{{ route('internacao.create') }}">
            <i class="fe-user-plus font-size-lg opacity-60 mr-2"></i>Cadastrar
        </a>
        <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Estabelecimento</h3>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="{{ route('estabelecimento.index') }}">
            <i class="fe-briefcase font-size-lg opacity-60 mr-2"></i>Listar
        </a>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="{{ route('estabelecimento.create') }}">
            <i class="fe-plus-square font-size-lg opacity-60 mr-2"></i>Cadastrar
        </a>
        <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Setor</h3>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="{{ route('setor.index') }}">
            <i class="fe-briefcase font-size-lg opacity-60 mr-2"></i>Listar
        </a>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="{{ route('setor.create') }}">
            <i class="fe-plus-square font-size-lg opacity-60 mr-2"></i>Cadastrar
        </a>
        <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Usuário</h3>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 {{ Route::currentRouteName() == 'usuario.index' ? 'active' : ''}}" href="{{ route('usuario.index') }}">
            <i class="fe-users font-size-lg opacity-60 mr-2"></i>Listar<span class="nav-indicator"></span>
        </a>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top  {{ Route::currentRouteName() == 'usuario.create' ? 'active' : ''}}" href="{{ route('usuario.create') }}">
            <i class="fe-user-plus font-size-lg opacity-60 mr-2"></i>Cadastrar
        </a>
        <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Configuração de perfil</h3>
        <a class="d-flex align-items-center nav-link-style px-4 py-3" href="account-profile.html">Alterar informações</a>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="account-payment.html">Solicitar permissão</a>
        <div class="d-flex align-items-center border-top"><a class="d-block w-100 nav-link-style px-4 py-3" href="account-notifications.html">Notificações</a>
          <div class="ml-auto px-3">
            <div class="custom-control custom-switch">
              <input class="custom-control-input" type="checkbox" id="notifications-switch" data-master-checkbox-for="#notification-settings" checked="">
              <label class="custom-control-label" for="notifications-switch"></label>
            </div>
          </div>
        </div>
        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="{{ route('logout') }}"><i class="fe-log-out font-size-lg opacity-60 mr-2"></i>Sair</a>
      </div>
    </div>
  </div>



