@extends('layouts.app')

@section('title','Course')

@section('content')
@if ($key === 0)
<form action="/Course" method="post">
    @csrf
    <div class="container">
        <h5 style="text-align: right;"><a href="/Add">Add Course</a> For Admin</h5>
        <br>
        <h1 style="text-align: center;">Course Available</h1>
        <br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($Data as $Datum)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <output name="title"><h5 class="card-title" value="xin">
                            {{$Datum->Title}}
                        </h5></output>
                    <h6>by:username</h6>
                    <p class="card-text">
                        <span class="d-inline-block text-truncate" style="max-width: 200px;">
                            {{$Datum->Description}}
                        </span>
                    </p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{$Datum->id}}">
                        Read
                      </button>

                      <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong{{$Datum->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle{{$Datum->id}}">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <h4>Description</h4><br>
                                    {{$Datum->Description}}
                                    <br><br><br>
                                    <h4>Material</h4><br>
                                    {{$Datum->Material}}
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"name="submit"value="{{$Datum->Title}}">Enroll</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</form>
@else
<div class="container">
    <h5 style="text-align: right;"><a href="/Add">Add Course</a> For Admin</h5>
    <br>
    <h1 style="text-align: center;">No course available at this moment</h1>
</div>
@endif

@endsection
