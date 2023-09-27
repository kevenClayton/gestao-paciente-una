<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <link rel="stylesheet" media="screen" href="{{ mix('css/theme.css') }}">
    <link rel="stylesheet" media="screen" href="css/style.css">
    <link rel="stylesheet" media="screen" href="plugins/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" media="screen" href="plugins/lightgallery.js/css/lightgallery.min.css">
    <link rel="stylesheet" media="screen" href="{{ mix('css/style.css') }}">
    @stack('scripts-top')
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" media="screen" href="fonts/font-awesome.min.css">
    <link rel="canonical" href="{{ url()->current() }}"/>

    <title>@yield('title', View::make('master.master'))</title>
    <meta name="description" content="@yield('description') @empty($description) ... @endempty">

</head>
<body>
    <main class="cs-page-wrapper">
        @if(Request::segment(1) != 'login'  )
            <div class="position-relative bg-primary" style="height: 480px;">
                <div class="cs-shape cs-shape-bottom cs-shape-slant bg-secondary d-none d-lg-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                        <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                    </svg>
                </div>
            </div>
            @include('includes.header')
        @endif
        <div class="cs-page-loading active">
            <div class="cs-page-loading-inner">
                <div class="cs-page-spinner"></div><span>Carregando...</span>
            </div>
        </div>

        @include('includes.scripts')
        @yield('content')
    </main>
    @include('includes.footer')
    @include('includes.whatsapp_web')
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Topo</span><i class="btn-scroll-top-icon fe-arrow-up">   </i></a>
    <script src="/js/jquery-3.5.min.js"></script>
    <script src="/plugins/jarallax/jarallax.min.js"></script>
    <script src="/plugins/shufflejs/shuffle.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/smooth-scroll.polyfills.min.js"></script>
    <script src="/js/theme.min.js"></script>
    <script src="{{ asset('js/mask/mask.js') }}"></script>
    <script src="/js/jquery-ui.min.js"></script>
    @stack('scripts-bottom')
    <script>
        (function () {
          window.onload = function () {
            var preloader = document.querySelector('.cs-page-loading');
            preloader.classList.remove('active');
            setTimeout(function () {
              preloader.remove();
            }, 2000);
          };
        })();

    </script>
</body>

</html>
