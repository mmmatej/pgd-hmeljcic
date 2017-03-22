@extends('layout.admin')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                @if($news->id)
                <h1>UREJANJE NOVICE</h1>
                @else
                <h1>DODAJANJE NOVICE</h1>
                @endif
            </div>

            <form method="POST" action="{{ $news->id ? '/admin/novice/'.$news->id:'/admin/novice' }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if($news->id)
                {{ method_field('PUT') }}
                @endif

                <div class="form-group">
                    <label for="title">Naslov</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?: $news->title }}">
                    @if ($errors->has('title'))
                        <p class="help-block text-right">*To polje je obvezno.</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" @if($news->id) disabled="disabled" @endif value="{{ old('slug') ?: $news->slug }}">
                    @if ($errors->has('slug'))
                        <p class="help-block text-right">*Ta "slug" je že v uporabi.</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="author">Avtor</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{ old('author') ?: $news->author }}">
                </div>
                <div class="form-group">
                    <label for="cover_text">Besedilo na naslovnici (opcijsko)</label>
                    <input type="text" class="form-control" id="cover_text" name="cover_text" value="{{ old('cover_text') ?: $news->cover_text }}">
                </div>
                <div class="form-group">
                    <label for="cover_style">Stil novice</label>
                    <select name="cover_style" id="cover_style" class="form-control">
                        <option @if(old('cover_style') == 'top' || $news->cover_style == 'top') selected="selected" @endif value="top">top</option>
                        <option @if(old('cover_style') == 'float' || $news->cover_style == 'float') selected="selected" @endif value="float">float</option>
                    </select>
                    @if ($errors->has('cover_style'))
                        <p class="help-block text-right">*To polje je obvezno.</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="abstract">Povzetek</label>
                    <textarea name="abstract" id="abstract" rows="10" class="form-control">{{ old('abstract') ?: $news->abstract }}</textarea>
                    @if ($errors->has('abstract'))
                        <p class="help-block text-right">*To polje je obvezno.</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="content">Vsebina</label>
                    <textarea name="content" id="content" rows="40" class="form-control">{{ old('content') ?: $news->content }}</textarea>
                    @if ($errors->has('content'))
                        <p class="help-block text-right">*To polje je obvezno.</p>
                    @endif
                </div>

                @if($news->id)
                <div class="page-header">
                    <h2>Galerija</h2>
                </div>

                <div class="row">
                    @foreach($news->images as $image)
                        <div class="col-md-2 text-center">
                            <img src="{{ $image->getUrl() }}" alt="{{ $image->description }}"
                                 class="img-responsive img-rounded">
                        </div>
                    @endforeach
                    <a href="#" data-toggle="modal" data-target="#image-modal" class="col-md-2 text-center bg-danger" style="padding:57px">
                        <span class="fa fa-2x fa-plus"></span><br>
                        Dodaj
                    </a>
                </div>
                @endif

                <div class="actions text-right">
                    @if(!$news->published)
                    <button type="submit" class="btn btn-default" name="draft">Shrani Osnutek</button>
                    @endif
                    @if($news->id)
                    <button type="submit" class="btn btn-danger" name="publish">Shrani in Objavi</button>
                    @endif
                </div>

            </form>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data" method="POST" action="/admin/novice/{{ $news->id }}/slike">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Dodajanje slik</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Slika</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="description">Opis</label>
                            <input type="text" class="form-control" id="description" name="description" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Shrani</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection