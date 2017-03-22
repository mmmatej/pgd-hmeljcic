@extends('layout.app')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="page-header">
                        <h1>NOVICA: {{ $news->title }}</h1>
                    </div>

                    {{--<div>--}}
                        {{--<span class="fa fa-clock-o"></span> {{ $news->created_at->format('d.m.Y \o\b H:i') }}--}}
                    {{--</div>--}}


                    <div class="text-justify">
                        @if($news->cover_style == 'top')
                            <p><b>{!! $news->abstract !!}</b></p>
                            <img src="{{ $news->getCoverImageUrl() }}"
                                 alt="{{ $news->getCoverImage()->description }}"
                                 class="img-responsive img-rounded"
                                 style="margin:0 40px 40px 0"
                            >
                        @else
                            <img src="{{ $news->getCoverImageUrl() }}"
                                 alt="{{ $news->getCoverImage()->description }}"
                                 class="img-responsive img-rounded pull-left"
                                 width="300px"
                                 style="margin:0 40px 40px 0"
                            >
                            <p><b>{!! $news->abstract !!}</b></p>
                        @endif

                        {!! $news->content !!}
                    </div>

                    @if($news->images->count())
                        <div class="clearfix"></div>
                        <div class="page-header">
                            <h2>Galerija</h2>
                        </div>

                        <div class="row">
                            @foreach($news->images as $image)
                                <div class="col-md-2 text-center">
                                    <a href="{{ $image->getUrl() }}"> {{--TODO: open in popup--}}
                                        <img src="{{ $image->getUrl() }}" alt="{{ $image->description }}"
                                         class="img-responsive img-rounded">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{--<div class="clearfix"></div>--}}
                    {{----}}
                    {{--<div class="page-header">--}}
                        {{--<h2>Komentarji</h2>--}}
                    {{--</div>--}}

                </div>

                <div class="col-md-3">
                    {{--<div class="img-thumbnail" style="margin-top: 80px;width:100%">--}}
                        {{--sidebar--}}
                    {{--</div>--}}

                    <div class="white-bg img-rounded" style="padding: 10px;margin-top:80px">
                        <b>Zadnje novice</b>

                        <table class="table table-striped table-hover">
                            @foreach($newsList as $n)
                                <tr>
                                    <td>
                                        <a href="{{ $n->getUrl() }}">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-3 hidden-sm hidden-xs">
                                                    <img src="{{ $n->getCoverImageUrl() }}"
                                                         class="img-responsive img-rounded"/>
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <div>{{ $n->title }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection