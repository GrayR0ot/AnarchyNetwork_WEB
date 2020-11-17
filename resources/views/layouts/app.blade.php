<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('/css/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/custom-responsive.css') }}">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script type="text/javascript" src="{{ url('/js/jquery-3.2.1.min.js') }}"></script>

    <link rel="icon" type="image/png" href="{{ url('/img/logo.png') }}"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158065281-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-158065281-3');
    </script>
    {!! SEO::generate() !!}
    <script data-ad-client="ca-pub-7450814845626162" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script type="text/javascript">
        window._mNHandle = window._mNHandle || {};
        window._mNHandle.queue = window._mNHandle.queue || [];
        medianet_versionId = "3121199";
    </script>
    <script src="https://contextual.media.net/dmedianet.js?cid=8CU27HLN8" async="async"></script>
</head>
<body class="front">
<div class="pusher">
    <div class="site-header" style="background-image: url('/img/background-min.jpg')">
        <div class="ui menu navbar">
            <div class="logo">
                <img src="{{ url('/img/logo-min.png') }}" width="60" alt="Logo">
            </div>

            <a onClick="$('.ui.menu.navbar.sidebar').sidebar('toggle')" class="item mobile-menu">
                <i class="sidebar icon"></i>
                Menu
            </a>

            <a title="Accueil" href="{{ url('/') }}" class="item"><i class="home icon"></i> Accueil</a>
            <a title="Nous Rejoindre" href="{{ url('/join') }}" class="item"><i class="share icon"></i> Jouer</a>

            <!--<a title="Boutique" href="{{ url('/shop') }}" class="ui item">
                <i class="shop icon"></i> Boutique
            </a>-->

            <a title="Voter" href="{{ url('/vote') }}" class="item"><i class="external icon"></i> Voter</a>

            <a title="Statistiques" href="{{ url('https://stats.anarchynetwork.eu') }}" class="item"><i class="target icon"></i> CLassement</a>

            <div class="ui dropdown item">
                <i class="help icon"></i> Aide
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a title="Wiki" href="{{ url('/wiki') }}" class="item"><i class="info icon"></i> Wiki</a>
                    <a title="FAQ" href="{{ url('/faq') }}" class="item"><i class="help circle icon"></i> FAQ</a>
                </div>
            </div>

            <!--<div class="right menu">
                @if (Auth::check())
                    <div class="item">
                        <a href="{{ url('/user') }}" class="ui anarchynetwork button"><i class="user icon"></i> {{ Auth::user()->name }}</a>
                    </div>
                    <div class="item">
                        <a href="{{ url('/logout') }}" class="ui button"><i class="sign out icon"></i> Déconnexion</a>
                    </div>
                @else
                    <div class="item">
                        <a href="{{ url('/signup') }}" class="ui anarchynetwork button"><i class="signup icon"></i> Inscription</a>
                    </div>
                    <div class="item">
                        <a href="{{ url('/login') }}" class="ui button"><i class="sign in icon"></i> Connexion</a>
                    </div>
                @endif
            </div>-->
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
                <div class="three wide column text-center">
                    <h4 class="ui inverted header">AnarchyNetwork</h4>
                    <div class="ui inverted link list">
                        <a title="Nous Rejoindre" href="{{ url('/join') }}" class="item">Jouer</a>
                        <a title="Voter" href="{{ url('/vote') }}" class="item">Voter</a>
                        <!--<a href="{{ url('/shop') }}" class="item">Boutique</a>-->
                    </div>
                </div>
                <div class="three wide column text-center">
                    <h4 class="ui inverted header">Aide</h4>
                    <div class="ui inverted link list">
                        <a title="Wiki" href="https://anarchynetwork.eu/wiki" class="item">Wiki</a>
                        <a title="FAQ" href="https://anarchynetwork.eu/faq" class="item">FAQ</a>
                    </div>
                </div>
                <div class="three wide column">
                    <div class="text-center">
                        <a title="Twitter AnarchyNetwork" rel="nofollow" target="_blank" href="https://twitter.com/grayr0ot" class="ui twitter button">
                            <i class="twitter icon"></i> Twitter
                        </a><br><br>
                        <a title="Youtube AnarchyNetwork" rel="nofollow" target="_blank" href="https://www.youtube.com/user/TheDestroyKilleur" class="ui youtube button">
                            <i class="youtube icon"></i> YouTube
                        </a>
                    </div>
                </div>
                <div class="seven wide column text-center">
                    <h4 class="ui inverted header">Crédits</h4>
                    <p>Ce site a été développé pour AnarchyNetwork par <a>GrayRoot</a> et <a>Eywek</a>.</p>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="{{ url('/js/semantic.min.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    @if (session('flash.success'))
    toastr.success("{!! addslashes(session('flash.success')) !!}")
    @endif
    @if (session('flash.error'))
    toastr.error("{!! addslashes(session('flash.error')) !!}")
    @endif
    @if (session('flash.warning'))
    toastr.warning("{!! addslashes(session('flash.warning')) !!}")
    @endif
    @if (session('flash.info'))
    toastr.info("{!! addslashes(session('flash.info')) !!}")
    @endif
</script>
<script type="text/javascript" src="{{ url('/js/app.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/form.js') }}"></script>
</body>
</html>
