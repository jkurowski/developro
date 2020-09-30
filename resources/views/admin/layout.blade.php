<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>kCMS</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="noindex, nofollow">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Wylaczenie numeru tel. -->
    <meta name="format-detection" content="telephone=no">

    <!-- Prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body class="lang-pl">
<div id="admin">
    <div class="sidemenu-holder">
        <div id="sidemenu">
            <ul class="list-unstyled mb0">
                <li class="">
                    <a href="">
                        <i class="fe-sliders"></i>
                        <span> Ustawienia </span>
                    </a>
                </li>
                <li class="">
                    <a href="">
                        <i class="fe-hard-drive"></i>
                        <span> RODO </span>
                    </a>
                </li>
                <li class="">
                    <a href="">
                        <i class="fe-users"></i>
                        <span> Użytkownicy </span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.page.*') ? 'active' : '' }}">
                    <a href="{{route('admin.page.index')}}">
                        <i class="fe-file-text"></i>
                        <span> Strony </span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.slider.*') ? 'active' : '' }}">
                    <a href="{{route('admin.slider.index')}}">
                        <i class="fe-airplay"></i>
                        <span> Slider </span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.article.*') ? 'active' : '' }}">
                    <a href="{{route('admin.article.index')}}">
                        <i class="fe-book-open"></i>
                        <span> Aktualności </span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.developro.*') ? 'active' : '' }}">
                    <a href="{{route('admin.developro.index')}}">
                        <i class="fe-home"></i>
                        <span> Inwestycje </span>
                    </a>
                </li>
                <li class="">
                    <a href="">
                        <i class="fe-image"></i>
                        <span> Galeria </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>

    <div id="content">
        <header id="header-navbar">
            <h1><a href="" class="logo"><span>kCMS v4.2</span></a></h1>

            <a href="#" id="togglemenu"><span class="fe-menu"></span></a>

            <div class="user">
                <ul>
                    <li><span class="fe-calendar"></span> <span id="livedate"><?=date('d-m-Y');?></span></li>
                    <li><span class="fe-clock"></span> <span id="liveclock"></span></li>
                    <li><span class="fe-user"></span> Witaj: <b>{{ Auth::user()->name }}</b></li>
                    <li><a title="Idź do strony" href="" target="_blank"><span class="fe-monitor"></span> Idź do strony</a></li>
                    <li>
                        <a title="Wyloguj" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="fe-lock"></span> Wyloguj</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </header>
        <div class="content">
            @yield('submenu')

            @yield('content')
        </div>
    </div>
</div>

<!--Google font style-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="/js/jquery.min.js" charset="utf-8"></script>
<script src="/js/bootstrap.bundle.min.js" charset="utf-8"></script>
<script src="/js/jquery-ui.min.js" charset="utf-8"></script>
<script src="/js/cms.js" charset="utf-8"></script>

@stack('scripts')

</body>
</html>
