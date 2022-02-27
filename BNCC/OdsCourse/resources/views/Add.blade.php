@extends('layouts.app')

@section('title','Add_Course_Admin')

@section('content')
    <div class="container">
        <form method="POST" action="/Add">
            @csrf
            <div class="form-group">
                <label for="Course_Title">Course Title</label>
                <input type="text" class="form-control" id="Course_Title" name="Course_Title" placeholder="Course Title">
            </div>
            <div class="form-group">
                <label for="Description">Course Description</label>
                <textarea class="form-control" id="Description" name="Description" placeholder="Course Description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="Description">Course Material</label>
                <textarea class="form-control" id="Material" name="Material" placeholder="Course Material" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-info check">Submit</button>
        </form>
    </div>
@endsection
