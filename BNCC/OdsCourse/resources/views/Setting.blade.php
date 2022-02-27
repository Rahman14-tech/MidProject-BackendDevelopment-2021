@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($Data as $Datum)
    <h1 class="Centerd_Text"> User Data for {{ $Datum->Username }}</h1>
    <br><br><br><br>
    <h2>Fullname        : {{ $Datum->name }}</h2>
    <h2>Phone Number    : {{ $Datum->Phone_Number }}</h2>
    <h2>Address         : {{ $Datum->Address }}</h2>
    <h2>Birth Date      : {{ $Datum->Birth_Date }}</h2>
    <h2>Age             : {{ $Datum->Age }}</h2>
    @endforeach
</div>
@endsection
