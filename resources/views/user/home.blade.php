@extends('user.layouts.source')

@section('source')
<div class="container">
    <div class="">
        <h3 class="text-center ">Welcome from Online Learning Courses</h3>
    </div>
   <div class="row mt-4">
    <div class="col-4 mt-2">
        <div class="card mb-5" style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title mb-2"><strong>Opening Course</strong></h5>
              <p class="card-text my-3">Start your online learning journey today with us!</p>
              <a href="{{ route('open#courseList') }}" class="btn btn-danger float-end">Check here</a>
            </div>
          </div>
          <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title mb-2"><strong>Popular Course</strong></h5>
                <p class="card-text my-3">Start your online learning journey today with us!</p>
                <a href="{{ route('popular#courseList') }}" class="btn btn-danger float-end">Check here</a>
              </div>
          </div>
    </div>
    <div class="col-4 mt-4">
        <div class="card mb-5" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title mb-2"><strong>Upcoming Course</strong></h5>
                <p class="card-text my-3">Start your online learning journey today with us!</p>
                <a href="{{ route('coming#courseList') }}" class="btn btn-danger float-end">Check here</a>
              </div>
          </div>
          <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title mb-2"><strong>Free Course</strong></h5>
                <p class="card-text my-3">Start your online learning journey today with us!</p>
                <a href="{{ route('free#courseList') }}" class="btn btn-danger float-end">Check here</a>
              </div>
          </div>

    </div>
    <div class="col-4 mt-4">
        <div class="card mb-5" style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title mb-2"><strong>Disucssion Forum</strong></h5>
              <p class="card-text my-3">You can ask anything here! All students discussion group.</p>
              <a href="{{ route('topic#page') }}" class="btn btn-primary col-12">Ask and Discuss</a>
            </div>
          </div>

      </div>
   </div>
</div>
@endsection
