@extends('layouts.app')

@section('title','home')

@section('content')
<div class="container">
            @if ($key === 1)
            <h1>Website Profile</h1><br>
                    <h4>OdsCourse is created at 22/2/2022.<br>
                    OdsCourse has offered a course from the best institutions from around the world.<br>
                    The Goal of the course itself to educate Indonesia with the best institution and it's completely free!!!<br>
                    Not forget to mention that the course itself uses self paced course.<br>
                    So, students can learn anytime and anywhere they want.</h4><br>
                    <h1 style="text-align: center;">What's Popular?</h1>
              <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($Popular as $pop)
              <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$pop->Course}}</h5>
                      <p class="card-text">{{$pop->Description}}</p>
                    </div>
                  </div>
              </div>
              @endforeach
              </div>
              <h3 style="text-align: center;">
                Why OdsCourse ? <br>
                1. Totally Free <br>
                2. Easy to understand <br>
                3. International quality <br>
              </h3>
</div>
            @else
            <div class="container">
                <h1 style="text-align: center;"> Your Course </h1><br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($total_course as $course)
                  <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">{{$course->Course}}</h5>
                          <p class="card-text">{{$course->Description}}</p>
                          <a href="/not"><button class="btn btn-primary">Go to Course</button></a>
                        </div>
                      </div>
                  </div>
                  @endforeach
              </div>
              <br><br>
              <h1 style="text-align: center;">What's Popular?</h1>
              <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($Popular as $pop)
              <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$pop->Course}}</h5>
                      <p class="card-text">{{$pop->Description}}</p>
                    </div>
                  </div>
              </div>
              @endforeach
          </div><br>
          <h3 style="text-align: center;">
            Why OdsCourse ? <br>
            1. Totally Free <br>
            2. Easy to understand <br>
            3. International quality <br>
        </h3>
            </div>
            @endif
</div>
@endsection
