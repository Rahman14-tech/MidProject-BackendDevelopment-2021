@extends('layouts.app')

@section('title','About')

@section('content')
<div class="container">
    <h1 style="text-align: center;"> About The Course </h1>
    <div class="row">
        <div class="col-sm">
            <img src="{{URL::asset('/image/landing.svg')}}" alt="About Image" class="responsive" style="justify-content: center;height:500px;width:500px;">
        </div>
        <div class="col-sm">
            <br><br><br>
            <h4><p>
                OdsCourse is created at 22/2/2022.<br>
                OdsCourse has offered a course from the best institutions from around the world.<br>
                The Goal of the course itself to educate Indonesia with the best institution and it's completely free!!!.<br>
                Not forget to mention that the course itself uses self paced course.<br>
                So, students can learn anytime and anywhere they want.<br>
            </p></h4>
        </div>
      </div>
</div>
@endsection
