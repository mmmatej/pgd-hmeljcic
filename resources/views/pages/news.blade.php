@extends('layout.app')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                <h1>NOVICE</h1>
            </div>

            <table class="table table-striped table-hover news-table">
            @foreach($news as $i => $n)

                    <tr>
                        <td>
                            <a href="{{ $n->getUrl() }}">
                            <div class="row">
                                <div class="col-md-3 col-lg-2 hidden-sm hidden-xs">
                                    <img src="{{ $n->getCoverImageUrl() }}"
                                         class="img-responsive img-rounded"/>
                                </div>
                                <div class="col-md-9 col-lg-10">
                                    <div class="title">{{ $n->title }}</div>

                                    <p class="text-justify">{{ $n->abstract }}</p>

                                    <div class="text-right">
                                        {{ $n->getTranslatedDate() }} <span class="fa fa-calendar"></span><br />
                                        {{ $n->author }} <span class="fa fa-user-circle-o"></span>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </td>
                    </tr>

            {{--<div>--}}
                {{--<a href="{{ $n->getUrl() }}">--}}
                    {{--<p>{{ $n->title }}</p>--}}
                {{--</a>--}}
            {{--</div>--}}
            @endforeach
            </table>

            {{ $news->links() }}
        </div>
    </section>

@endsection