@extends('layout.admin')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                <h1>UREJANJE NOVIC</h1>
            </div>

            <div style="margin-bottom: 30px">
                <a href="/admin/novice/dodaj" class="btn btn-default"><span class="fa fa-plus"></span> Dodaj novico</a>
            </div>

            <table class="table table-striped table-hover news-table">
                <tr>
                    <td>ID</td>
                    <td>Naslov</td>
                    <td>Datum objave</td>
                    <td>Akcije</td>
                </tr>
                @forelse($news as $n)
                    <tr>
                        <td>{{ $n->id }}</td>
                        <td>{{ $n->title }} @if(!$n->published) <code>(osnutek)</code> @endif</td>
                        <td>{{ $n->created_at->toDateTimeString() }}</td>
                        <td>
                            <a href="/admin/novice/{{ $n->id }}/uredi" class="btn btn-default"><span
                                        class="fa fa-edit"></span></a>

                            <form class="inline" method="POST" action="/admin/novice/{{ $n->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-default"><span class="fa fa-trash"></span></button>
                            </form>

                            @if($n->published)
                            <form class="inline" method="POST" action="/admin/novice/{{ $n->id }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <button class="btn {{ $n->is_cover_news ? 'btn-danger':'btn-default' }}" name="set-as-cover-news"><span class="fa fa-bolt"></span></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Ni novic.</td>
                    </tr>
                @endforelse
            </table>

            {{ $news->links() }}
        </div>
    </section>

@endsection