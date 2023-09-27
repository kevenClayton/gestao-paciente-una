<header class="cs-header navbar navbar-expand-lg navbar-dark navbar-floating navbar-sticky" data-scroll-header>
    <div class="container-fluid px-0 px-xl-3">
      <button class="navbar-toggler ml-n2 mr-2" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu">
          <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4" href="#">
        <img class="navbar-floating-logo d-none d-lg-block" width="153" src="/img/logo/logo.svg" alt="Logomarca {{ env('APP_NAME') }}"/>
        <img class="navbar-stuck-logo" width="153" src="/img/logo/logo.svg" alt="Logomarca {{ env('APP_NAME') }}"/>
        <img class="d-lg-none" width="58" src="/img/logo/logo.svg" alt="Logomarca {{ env('APP_NAME') }}"/>
    </a>
      <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
        <div class="navbar-tool dropdown">
            <a class="navbar-tool-icon-box" href="#">
                <img class="navbar-tool-icon-box-img" src="/img/avatar/main-sm.jpg" alt="Avatar"/>
            </a>
            <a class="navbar-tool-label dropdown-toggle" href="#"><small>Olá,</small>{{ $nomeTratado = Str::of(auth()->user()->nome)->words(1) }}</a>
          <ul class="dropdown-menu dropdown-menu-right" style="width: 15rem;">
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                    <i class="fe-log-out font-size-base opacity-60 mr-2"></i>Sair<span class="nav-indicator"></span>
                </a>
            </li>
          </ul>
        </div>
      </div>


      <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
        <div class="cs-offcanvas-cap navbar-box-shadow">
          <h5 class="mt-1 mb-0">Menu</h5>
          <button class="close lead" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="cs-offcanvas-body">
          <!-- Menu-->
          <ul class="navbar-nav">
            <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Paciente</a>
              <ul class="dropdown-menu">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Cadastrar</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('paciente.create')}}">Cadastro rápido</a></li>
                    <li><a class="dropdown-item" href="{{route('paciente.create')}}">Cadastro completo</a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="{{route('paciente.index')}}">Listar</a></li>
                <li><a class="dropdown-item" href="{{route('paciente.index')}}">Dar alta</a></li>
                <li><a class="dropdown-item" href="{{route('paciente.index')}}">Buscar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Estabelecimento</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('estabelecimento.create')}}">Listar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Internação</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('internacao.create')}}">Criar</a></li>
                <li><a class="dropdown-item " href="{{route('internacao.index')}}" >Listar</a>
                </li>
              </ul>
            </li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>


