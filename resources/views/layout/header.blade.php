@inject('menu', 'App\PgdHmeljcic\Helpers\Menu')

<!-- Fixed navbar -->
<nav id="main-navbar" class="navbar navbar-fixed-top {{ $menu->activeNavbar() }}">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ $menu->activeMenu('/') }}"><a href="/">DOMOV</a></li>
                <li class="{{ $menu->activeMenu('o-drustvu') }}"><a href="/o-drustvu">O DRUŠTVU</a></li>
                <li class="{{ $menu->activeMenu('novice') }}"><a href="/novice">NOVICE</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">VOZILA IN TEHNIKA <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-together">
                        <li><a href="#">Gasilsko vozilo s cisterno GVC 16/25</a></li>
                        <li><a href="#">Hitro tehnično reševalno vozilo HTRV-1</a></li>
                        <li><a href="#">Poveljniško vozilo PV 1</a></li>
                        <li><a href="#">Hitro tehnično reševalno vozilo HTV</a></li>
                        <li><a href="#">Priklopnik za prevoz vodne zavese</a></li>
                    </ul>
                </li>
                <li class="{{ $menu->activeMenu('clani') }}"><a href="/clani">ČLANI</a></li>
                <li class="{{ $menu->activeMenu('kontakt') }}"><a href="/kontakt">KONTAKT</a></li>
                <li class="hidden-xs hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="btn btn-danger"><i class="glyphicon glyphicon-search"
                                                                             aria-hidden="true"></i></span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>