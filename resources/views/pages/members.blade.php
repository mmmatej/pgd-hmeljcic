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

            <div class="row all" id="members-list">
                <div id="members-filters" class="col-md-12" style="margin-top:30px;margin-bottom:40px">
                    <b>Filtriraj: </b>
                    <button data-group="all"      class="btn btn-default all">Vsi člani</button>
                    <button data-group="mladina"  class="btn btn-default mladina">Mladina</button>
                    <button data-group="clani"    class="btn btn-default clani">Člani</button>
                    <button data-group="clanice"  class="btn btn-default clanice">Članice</button>
                    <button data-group="veterani" class="btn btn-default veterani">Veterani</button>
                </div>
                @foreach($members as $i => $member)
                    <div class="col-md-3 text-center {{ str_slug($member->group) }}">
                        <div class="img-rounded" style="height:180px;background:url({{ $member->getImageUrl() }});background-size:cover"></div>

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