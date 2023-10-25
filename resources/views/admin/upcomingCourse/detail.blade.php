@extends('admin.layouts.source')

@section('source')

<div class="container">
   <div class="">
    <div class="text-center my-3 fs-4"><strong>Course Detail</strong></div>
    <div class="row col-6 offset-3 mt-3 p-2 border-opacity-25 rounded border border-dark">
        <div class="" >
            <a href="{{ route('UpComingCourse#listPage') }}" class="text-dark text-decoration-none m-1" ><i class=" fs-5 fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-4  mt-2" >

            <div class="">
                <img class="img-thumbnail" src="{{ asset('storage/'.$course->image) }}" alt="">
            </div>

        </div>
        <div class="col-6 offset-1 mt-2  ">
            <div class="text-center text-danger mb-3">
                <h4><strong>{{ $course->name }}</strong></h4>
            </div>
            <button class="btn btn-dark m-1 text-white">{{ $course->category_name }}</button>

            <button class="btn btn-dark m-1 text-white">{{ $course->time }}</button>
            <button class="btn btn-dark m-1 text-white">{{ $course->fee }} kyats</button>
            <button class="btn btn-dark m-1 text-white">{{ $course->description }}</button>
            <button class="btn btn-dark m-1 text-white">{{ $course->created_at->format('j-F-y') }}</button>
        </div>
    </div>
   </div>
</div>

@endsection


