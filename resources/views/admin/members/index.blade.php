@extends('layout.admin')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                <h1>UREJANJE ČLANOV</h1>
            </div>

            <div style="margin-bottom: 30px">
                <a href="/admin/clani/dodaj" class="btn btn-default"><span class="fa fa-plus"></span> Dodaj člana</a>
            </div>

            <table class="table table-striped table-hover news-table">
                <tr>
                    <td>ID</td>
                    <td>Ime</td>
                    <td>Skupina</td>
                    <td>Akcije</td>
                </tr>
                @forelse($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->group }}</td>
                        <td>
                            <a href="/admin/clani/{{ $member->id }}/uredi" class="btn btn-default"><span
                                        class="fa fa-edit"></span></a>

                            <form class="inline" method="POST" action="/admin/clani/{{ $member->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-default"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Ni članov.</td>
                    </tr>
                @endforelse
            </table>

            {{ $members->links() }}
        </div>
    </section>

@endsection