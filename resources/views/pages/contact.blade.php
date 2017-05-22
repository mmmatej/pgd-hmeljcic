@extends('layout.app')

@section('content')

    <section id="main-section">
        <div class="container">
            <div class="page-header">
                <h1>KONTAKT</h1>
            </div>

            <div class="row">
                {{--<div class="col-md-12 text-justify" style="margin-bottom:40px">--}}
                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores consequuntur delectus dolores eaque eos eveniet fugiat iure perspiciatis, quaerat quam quasi quidem quisquam repellendus, saepe sit unde vitae voluptates?</p>--}}
                {{--</div>--}}

                <div class="col-md-4">
                    <dl>
                        <dt>PGD Hmeljčič</dt>
                        <dd>Hmeljčič 7</dd>
                        <dd>8216 Mirna Peč</dd>
                    </dl>

                    <dl>
                        <dt>Tel</dt>
                        <dd>031 357 343 (Irena Pust)</dd>
                        <dd>041 861 562 (Mitja Pust)</dd>
                    </dl>

                    <dl>
                        <dt>Email</dt>
                        <dd><a href="mailto:pust.mitja@gmail.com">pust.mitja@gmail.com</a></dd>
                    </dl>

                    <img src="https://maps.googleapis.com/maps/api/staticmap?center=Hmeljčič+7&zoom=13&scale=1&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7CHmeljčič+7" alt="map" class="img-responsive">
                </div>
                <div class="col-md-8 text-justify">

                    @if(isset($sent)) <p class="alert alert-success">Sporočilo je bilo uspešno poslano. Hvala.</p> @endif

                    <form method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Vaše ime</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <p class="help-block text-right">*To polje je obvezno.</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Vaš email naslov</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <p class="help-block text-right">*To polje je obvezno.</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="content">Vsebina sporočila</label>
                            <textarea name="content" id="content" rows="10" class="form-control">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <p class="help-block text-right">*To polje je obvezno.</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-danger pull-right">Pošlji</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection