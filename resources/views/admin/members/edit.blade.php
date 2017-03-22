@extends('layout.admin')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                @if($member->id)
                <h1>UREJANJE ČLANA</h1>
                @else
                <h1>DODAJANJE ČLANA</h1>
                @endif
            </div>

            <form enctype="multipart/form-data" method="POST" action="{{ $member->id ? '/admin/clani/'.$member->id:'/admin/clani' }}">
                {{ csrf_field() }}
                @if($member->id)
                {{ method_field('PUT') }}
                @endif

                <div class="form-group">
                    <label for="name">Ime in Priimek</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $member->name }}">
                    @if ($errors->has('name'))
                        <p class="help-block text-right">*To polje je obvezno.</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">Skupina</label>
                    <select name="group" id="group" class="form-control">
                        <option @if(old('group') == 'Mladina' || $member->group == 'Mladina') selected="selected" @endif value="Mladina">Mladina</option>
                        <option @if(old('group') == 'Člani' || $member->group == 'Člani') selected="selected" @endif value="Člani">Člani</option>
                        <option @if(old('group') == 'Članice' || $member->group == 'Članice') selected="selected" @endif value="Članice">Članice</option>
                        <option @if(old('group') == 'Veterani' || $member->group == 'Veterani') selected="selected" @endif value="Veterani">Veterani</option>
                    </select>
                    {{--<input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $member->name }}">--}}
                    @if ($errors->has('group'))
                        <p class="help-block text-right">*To polje je obvezno.</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Slika</label>
                    <div class="row">
                        <div class="col-md-3">
                            @if($member->id)
                            <img src="{{ $member->getImageUrl() }}" alt="" class="img-responsive img-thumbnail">
                            @endif

                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @if ($errors->has('image'))
                                {{ json_encode($errors->get('image')) }}
                                <p class="help-block text-right">*To polje je obvezno / Dovoljena formati so: jpeg, png,
                                    bmp, gif, svg / Minimalna dimezija: 100x100px</p>
                            @endif

                        </div>
                        <div class="col-md-9"></div>
                    </div>
                </div>

                <div class="actions text-right">
                    <button type="submit" class="btn btn-danger">Shrani</button>
                </div>

            </form>
        </div>
    </section>

@endsection