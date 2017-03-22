@extends('layout.app')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                <h1>ČLANI</h1>
            </div>

            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur cumque
                doloribus hic iure natus
                officiis quam quod ullam. Aliquid atque dolor error minima quisquam. Ab harum quos sapiente unde
                voluptatem.</p>

            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae fuga hic impedit
                itaque repudiandae? Accusamus asperiores atque consequatur delectus error exercitationem, facere illum
                iusto recusandae reprehenderit saepe ut voluptas voluptate.</p>

            <p>
            {{--<dl class="dl-horizontal">--}}
                {{--<dt>Število članov:</dt>--}}
                {{--<dd>112</dd>--}}
                {{--<dt>Povprečna starost:</dt>--}}
                {{--<dd>11.2 let</dd>--}}
                {{--<dt>Povp. oddaljenost:</dt>--}}
                {{--<dd>11.2 km</dd>--}}
            {{--</dl>--}}

            <div class="row">
                <div id="members-filters" class="col-md-12" style="margin-top:30px;margin-bottom:40px">
                    <b>Filtriraj: </b>
                    <button data-group=""         class="btn btn-danger">Vsi člani</button>
                    <button data-group="mladina"  class="btn btn-default">Mladina</button>
                    <button data-group="clani"    class="btn btn-default">Člani</button>
                    <button data-group="clanice"  class="btn btn-default">Članice</button>
                    <button data-group="veterani" class="btn btn-default">Veterani</button>
                </div>
                @foreach($members as $i => $member)
                    <div class="col-md-3 text-center {{ str_slug($member->group) }}">
                        <img src="http://lorempixel.com/300/300/people/?i={{$i}}" alt=""
                             class="img-responsive img-rounded">
                        <dl>
                            <dt>{{ $member->name }}</dt>
                            <dd>{{ $member->group }}</dd>
                        </dl>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection