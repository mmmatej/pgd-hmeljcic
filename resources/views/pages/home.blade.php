@extends('layout.app')

@section('content')

    <section id="news">
        <!--<ul>-->
        <!--<li style="background-image: url('https://dvqlxo2m2q99q.cloudfront.net/000_clients/205431/page/w1000-20543114245AUAx.jpg');">-->
        <!--<span>16. julij 2016</span>-->
        <!--<h1>DRŽAVNI PRVAKI 2016!!!</h1>-->
        <!--<p>Verjetno že veste za veselo novico, katera bo za nas prišla šele čez nekaj časa.</p>-->

        <!--<button class="btn btn-danger">PREBERI VEČ</button>-->
        <!--</li>-->
        <!--</ul>-->
        <ul>
            <li style="background-image: url('{{ $news->getCoverImageUrl() }}');">
                <span>{{ $news->getTranslatedDate() }}</span>
                <h1 style="text-transform:uppercase">{{ $news->title }}</h1>
                <p>{{ $news->cover_text }}</p>

                <a href="{{ $news->getUrl() }}"><button class="btn btn-danger">PREBERI VEČ</button></a>
            </li>
        </ul>
    </section>
    <section class="dark" id="phone-call">
        <div class="container">
            <div class="medialeft">
                <!--<span class="glyphicon glyphicon-fire"></span>-->
                <!--<span class="glyphicon glyphicon-bullhorn"></span>-->
                <span class="glyphicon glyphicon-phone-alt"></span>
            </div>
            <div class="mediabody">
                <b><span class="text-danger">Ko pokličite 112?</span> Povejte:</b><br/>
                Kdo kliče? Kaj se je zgodilo? Kdaj se je zgodilo? Kje se je zgodilo?
                Koliko je ponesrečencev? Kakšne so poškodbe? Kakšno pomoč potrebujete?
            </div>
        </div>
    </section>

    <div class="container" id="groups">
        {{--<a href="/clani">--}}
            <div class="col-sm-3 col-xs-12 media">
            <span class="medialeft">
                <span class="glyphicon glyphicon-fire"></span>
            </span>
                <div class="mediabody">
                    <h4>Operativa</h4>
                    <p>Preberite si več o operativnem delu</p>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 media">
            <span class="medialeft">
                <span class="glyphicon glyphicon-fire"></span>
            </span>
                <div class="mediabody">
                    <h4>Članice</h4>
                    <p>Preberite si več o članicah PGD Hmeljčič</p>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 media">
            <span class="medialeft">
                <span class="glyphicon glyphicon-fire"></span>
            </span>
                <div class="mediabody">
                    <h4>Člani</h4>
                    <p>Preberite si več o članih PGD Hmeljčič</p>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 media">
            <span class="medialeft">
                <span class="glyphicon glyphicon-fire"></span>
            </span>
                <div class="mediabody">
                    <h4>Veterani</h4>
                    <p>Preberite si več o veteranih PGD Hmeljčič</p>
                </div>
            </div>
        {{--</a>--}}
    </div>


@endsection