<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        h1 { margin-bottom: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        .right { text-align: right; }
        .no-border td { border: none; }
    </style>
</head>
<body>

<h1>RĒĶINS</h1>
<p>
    Rēķina Nr: <strong>{{ $pasutijums->id }}</strong><br>
    Datums: {{ $pasutijums->created_at->format('d.m.Y') }}
</p>

<hr>

<table class="no-border">
<tr>
<td>
<strong>Pārdevējs:</strong><br>
SIA Vafeles<br>
Reģ. Nr.: 40203661043<br>
PVN Nr.: LV000000000<br>
Adrese: Rīga, Daugavgrīvas iela 74A - 99, LV-1007<br>
E-pasts: info@vafeles.lv
</td>

<td>
<strong>Pircējs:</strong><br>
{{ $pasutijums->user->name ?? 'Viesis' }}<br>
{{ $pasutijums->user->email ?? '' }}
</td>
</tr>
</table>

<table>
<thead>
<tr>
    <th>Nr</th>
    <th>Produkts</th>
    <th>Daudzums</th>
    <th>Cena (€)</th>
    <th>Kopā (€)</th>
</tr>
</thead>

<tbody>
@php $nr = 1; @endphp
@foreach($pasutijums->produkti as $p)
<tr>
    <td>{{ $nr++ }}</td>
    <td>{{ $p->nosaukums }}</td>
    <td>{{ $p->daudzums }}</td>
    <td class="right">{{ number_format($p->cena, 2) }}</td>
    <td class="right">{{ number_format($p->cena * $p->daudzums, 2) }}</td>
</tr>
@endforeach
</tbody>
</table>

<p class="right">
<strong>KOPĀ: €{{ number_format($pasutijums->kopa, 2) }}</strong>
</p>

<p>
Paldies par pasūtījumu!<br>
SIA Vafeles
</p>

</body>
</html>
