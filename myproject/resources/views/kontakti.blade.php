@extends('layouts.app')

@section('content')

<h1 style="text-align:center;">Kontakti</h1>

{{-- Uzņēmuma informācija --}}
<div style="text-align:center; margin-top:30px; font-size:18px;">
    <p><strong>SIA "Vafeles"</strong></p>
    <p>Reg. nr.: 40203661043</p>
    <p>Adrese: Rīga, Daugavgrīvas iela 74A - 99, LV-1007</p>
    <p>Talrunis: +371 28100382</p>
    <p>E-pasts: info@vafeles.lv</p>
</div>

<hr style="margin:40px 0;">

{{-- Ziņas veiksmīgas nosūtīšanas paziņojums --}}
@if(session('success'))
    <p style="color: green; text-align:center;">{{ session('success') }}</p>
@endif

{{-- Saziņas forma --}}
<div style="max-width:500px; margin:0 auto;">

    <h2>Sazinies ar mums</h2>

    <form method="POST" action="{{ route('kontakti.sutit') }}">
        @csrf

        <label>Vārds:</label><br>
        <input type="text" name="vards" value="{{ old('vards') }}" style="width:100%; padding:8px;">
        @error('vards') <p style="color:red">{{ $message }}</p> @enderror
        <br><br>

        <label>E-pasts:</label><br>
        <input type="email" name="epasts" value="{{ old('epasts') }}" style="width:100%; padding:8px;">
        @error('epasts') <p style="color:red">{{ $message }}</p> @enderror
        <br><br>

        <label>Ziņojums:</label><br>
        <textarea name="zinojums" style="width:100%; padding:8px;" rows="5">{{ old('zinojums') }}</textarea>
        @error('zinojums') <p style="color:red">{{ $message }}</p> @enderror
        <br><br>

        <button type="submit" style="padding:10px 20px;">Sūtīt</button>
    </form>

</div>

@endsection
