@extends('layouts.app')

@section('title','Course')

@section('content')
    <div class="container">
        <img src="{{URL::asset('/image/error.svg')}}" alt="course" class="intro-image responsive" style="height: 50%; width:50%;">
        <br>
        <h2>Error:{{$error}}</h2>
    </div>
@endsection
