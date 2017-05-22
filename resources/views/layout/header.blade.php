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
                <li class="{{ $menu->activeMenu('novice') }}"><a href="/novice">NOVICE</a></li>
                <li class="{{ $menu->activeMenu('o-drustvu') }}"><a href="/o-drustvu">O DRUŠTVU</a></li>
                {{--<li class="{{ $menu->activeMenu('clani') }}"><a href="/clani">ČLANI</a></li>--}}
                {{--<li class="dropdown {{ $menu->activeMenu('vozila-in-tehnika') }}">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
                       {{--aria-expanded="false">VOZILA IN TEHNIKA <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu dropdown-together">--}}
                        {{--<li><a href="/vozila-in-tehnika/gasilsko-vozilo-s-cisterno-gvc-16-25">Gasilsko vozilo s cisterno GVC 16/25</a></li>--}}
                        {{--<li><a href="/vozila-in-tehnika/hitro-tehnicno-resevalno-vozilo-htrv-1">Hitro tehnično reševalno vozilo HTRV-1</a></li>--}}
                        {{--<li><a href="#">Poveljniško vozilo PV 1</a></li>--}}
                        {{--<li><a href="#">Hitro tehnično reševalno vozilo HTV</a></li>--}}
                        {{--<li><a href="#">Priklopnik za prevoz vodne zavese</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">POVEZAVE <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-together">
                        <li><a href="http://www.gasilec.net/" target="_blank">Gasilska Zveza Slovenije</a></li>
                        <li><a href="http://www.gasilci.org/" target="_blank">Gasilci.Org</a></li>
                        <li><a href="http://spin.sos112.si/" target="_blank">SPIN</a></li>
                        <li><a href="https://apl.gasilec.net/Vulkan" target="_blank">Vulkan</a></li>
                        <li><a href="https://www.mirnapec.si/" target="_blank">Občina Mirna Peč</a></li>
                        <li><a href="https://www.facebook.com/PGD-Hmeljčič-1481928608779856" target="_blank">PGD Hmeljčič Facebook stran</a></li>
                    </ul>
                </li>
                <li class="{{ $menu->activeMenu('kontakt') }}"><a href="/kontakt">KONTAKT</a></li>
                <li id="tax">
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tax-modal">Small modal</button>--}}

                    <a href="#" data-toggle="modal" data-target="#tax-modal"><i class="glyphicon glyphicon-heart text-danger"></i> DARUJ DEL DOHODNINE</a>
                    <a href="#" data-toggle="modal" data-target="#tax-modal" class="jump">
                        <span class="btn btn-danger">
                            {{--<i class="glyphicon glyphicon-search" aria-hidden="true"></i>--}}
                            <i class="glyphicon glyphicon-heart" aria-hidden="true"></i>
                        </span>
                        <div class="tooltip bottom" style="width:162px;margin-left:-60px">
                            <div class="tooltip-arrow"></div>
                            <div class="tooltip-inner"> DARUJ DEL DOHODNINE</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="tax-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <iframe src="https://www.pgd-hmeljcic.si/dobrodelen" height="607px" width="500px" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" id="_widget_if"></iframe>
        </div>
    </div>
</div>