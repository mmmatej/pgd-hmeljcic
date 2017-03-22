@extends('layout.app')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                <h1>NOVICE</h1>
            </div>

            <table class="table table-striped table-hover">
            @foreach($news as $n)

                    <tr>
                        <td>
                            <a href="{{ $n->getUrl() }}">
                            <div class="row">
                                <div class="col-md-3 col-lg-2 hidden-sm hidden-xs">
                                    <img src="{{ $n->getCoverImageUrl() }}"
                                         class="img-responsive img-rounded"/>
                                </div>
                                <div class="col-md-9 col-lg-10">
                                    <div style="font-size:17px;font-weight: 500">{{ $n->title }}</div>
                                    <p>{{ $n->abstract }}</p>
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