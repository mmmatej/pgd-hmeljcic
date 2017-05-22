<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 {
            text-align: center;
            font-size: 16px;
        }
        h2 {
            font-size: 14px;
        }
        div {
            display: block;
        }

        span {
            border-bottom: 1px solid black;
            font-size: 12px;
        }

        small {
            display: block;
            margin-bottom: 12px;
            font-size: 11px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        table, th, td {
            border: 1px solid black;
        }
        th {
            background-color: #3a3a3a;
            color:#FFF;
            font-size: 12px;
            padding: 5px 0;
        }
    </style>
</head>
<body>

<h2>PODATKI O DAVČNEM ZAVEZANCU:</h2>

<div>
    <span>{{ $name }}</span>
    <small>(ime in priimek davčnega zavezanca)</small>
</div>


<div>
    <span>{{ $address }}</span>
    <small>(podatki o bivališču: naselje, ulica, hišna številka)</small>
</div>

<div>
    <span>{{ $post }}</span>
    <small>(poštna številka, ime pošte)</small>
</div>

<div>
    <span>
        {{ $tax }}
    </span>
    <small>(davčna številka)</small>
</div>


<h1>ZAHTEVA<br />za namenitev dela dohodnine za donacije</h1>

<table>
    <tr>
        <th>Ime oziroma naziv upravičenca</th>
        <th colspan="8">Davčna številka upravičenca</th>
        <th>Odstotek (%)</th>
    </tr>
    <tr>
        <td>PGD Hmeljčič</td>
        <td>2</td>
        <td>8</td>
        <td>5</td>
        <td>1</td>
        <td>3</td>
        <td>7</td>
        <td>4</td>
        <td>6</td>
        <td>{{ $percent }}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr><tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr><tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr><tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<div style="margin-bottom: 300px">&nbsp;</div>

<div style="font-size: 12px">V/Na ____________________, dne ____________________</div>

<div style="text-align: right">
    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <small>podpis zavezanca/ke</small>
</div>

</body>
</html>