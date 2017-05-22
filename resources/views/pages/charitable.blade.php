<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            background:#dace9c;
        }
        h1 {
            font-size:24px;
            text-align: center;
        }
        h2 {
            color:#8c3317;
            font-size: 17px;
            text-align: center;
        }
        .form-control {
            margin-bottom: -8px;
            height:25px;
        }
        select {
            margin-bottom: 30px!important;
        }
        #submitBtn {
            margin-top: 30px;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
    <form method="post">
        {{ csrf_field() }}

        <h1>Nič vas ne stane, da ste dobrodelni.</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Podatki o davčnem zavezancu:</h2>

        <div class="form-group">
            {{--<label for="name">Ime oz.naziv upravičenca</label>--}}
            <input type="text" class="form-control" id="name" name="name" placeholder="Ime oz.naziv upravičenca" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            {{--<label for="address">Naselje, ulica, hišna številka</label>--}}
            <input type="text" class="form-control" id="address" name="address" placeholder="Naselje, ulica, hišna številka" value="{{ old('address') }}">
        </div>

        <div class="form-group">
            {{--<label for="post">Poštna številka, ime pošte</label>--}}
            <input type="text" class="form-control" id="post" name="post" placeholder="Poštna številka, ime pošte" value="{{ old('post') }}">
        </div>

        <div class="form-group">
            {{--<label for="tax">Davčna številka</label>--}}
            <input type="text" class="form-control" id="tax" name="tax" placeholder="Davčna številka" value="{{ old('tax') }}">
        </div>

        <select id="office" name="office" class="form-control">
            <option value="0">Pristojni finančni urad, izpostava</option>
            <option>Finančni urad Brežice</option>
            <option>Finančni urad Celje</option>
            <option>Finančni urad Ljubljana</option>
            <option>Finančni urad Dravograd</option>
            <option>Finančni urad Hrastnik</option>
            <option>Finančni urad Kočevje</option>
            <option>Finančni urad Koper</option>
            <option>Finančni urad Kranj</option>
            <option>Finančni urad Maribor</option>
            <option>Finančni urad Murska Sobota</option>
            <option>Finančni urad Nova Gorica</option>
            <option>Finančni urad Novo mesto</option>
            <option>Finančni urad Postojna</option>
            <option>Finančni urad Ptuj</option>
            <option>Finančni urad Velenje</option>
        </select>


        <h2 class="second">ZAHTEVA za namenitev dela dohodnine za donacije*</h2>
        <div class="form-group">
            <input type="text" class="form-control" value="PGD Hmeljčič" disabled="disabled">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="Hmeljčič 7" disabled="disabled">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="8216 Mirna Peč" disabled="disabled">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="28513746" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="tax">Odstotek (%)</label>
            <input type="text" class="form-control" id="percent" name="percent" value="0,5%">
        </div>

        <div class="content_container"><p>* Vsi davčni zavezanci imate možnost odločanja o svoji dohodnini. <strong>Do 0,5 odstotka </strong>lahko namenite eni izmed organizacij iz seznama upravičencev do donacije dohodnine.</p></div>


        <div class="text-center" id="submitBtn">
            <input class="btn btn-default" type="submit" name="print" value="Natisni zahtevek">
        </div>
    </form>
</div>
</body>
</html>