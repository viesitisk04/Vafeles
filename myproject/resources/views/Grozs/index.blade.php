@extends('layouts.app')

@section('content')
<div class="container-centered">

<h1>🛒 Tavs grozs</h1>

@if(empty($grozs))
    <p>Grozs ir tukšs.</p>
@else

<table border="1" cellpadding="10">
    <tr>
        <th>Produkts</th>
        <th>Cena</th>
        <th>Daudzums</th>
        <th>Kopā</th>
        <th></th>
    </tr>

@php $kopa = 0; @endphp

@foreach($grozs as $id => $produkts)
    @php
        $summa = $produkts['cena'] * $produkts['daudzums'];
        $kopa += $summa;
    @endphp
<tr>
    <td>{{ $produkts['nosaukums'] }}</td>
    <td>€{{ number_format($produkts['cena'], 2) }}</td>

    <td>
        <form action="{{ route('grozs.atjauninat') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="number" name="daudzums" min="1" value="{{ $produkts['daudzums'] }}">
            <button>Atjaunināt</button>
        </form>
    </td>

    <td>€{{ number_format($summa, 2) }}</td>

    <td>
        <form action="{{ route('grozs.dzest') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <button>❌</button>
        </form>
    </td>
</tr>
@endforeach
</table>

<h3>Kopā: €{{ number_format($kopa, 2) }}</h3>

@endif
</div>
@endsection
