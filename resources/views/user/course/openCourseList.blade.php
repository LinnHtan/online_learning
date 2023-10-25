@extends('user.layouts.source')

@section('source')
<div class="container">
    <style>
        .align-middle {
            vertical-align: middle;
        }
    </style>
    <div class="mt-2">
        <h3 class="text-center">Opening Courses</h3>

    </div>
   <div class="">
    {{-- @if (session('message'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i>{{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif --}}
    <div class=""><h5>Total - {{ $course->total() }}</h5></div>
    <form action="{{ route('open#courseList') }}" method="get">
    <div class="d-flex">

            @csrf
            <input type="text" name="searchKey" class="form-control col-2 offset-9" placeholder="Search..."><button class="text-white btn btn-dark" type="submit">Search</button>

    </div>
</form>
   </div>

    <div class="mt-5 col-12">

        @if (count($course) != 0)
        <table class="table table-striped ">
            <thead class="table-dark">
                <tr scope="row">
                  <th class="col-1">Name</th>
                  <th >Image</th>
                  <th >Category Id</th>
                  <th >Description</th>
                  <th>Class Duration</th>
                  <th>Class Fee</th>
                  <th>Created Date</th>
                  <th></th>
                </tr>
              </thead>
             <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
              <tbody>

                 @foreach ($course as $c)

                 <input type="hidden" value="{{ $c->id }}">
                 <tr scope="row">
                 <th class="align-middle col-1">{{ $c->name }}</th>
                 <th>
                    <img src="{{ asset('storage/'.$c->image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                 </th>
                 <th class="align-middle ">{{ $c->category_id }}</th>
                  <td class="align-middle ">{{ $c->description }}</td>
                  <td class="align-middle">{{ $c->time }}</td>
                  <td class="align-middle">{{ $c->fee }}</td>
                  <td class="align-middle">{{ $c->created_at->format('j-F-y') }}</td>
                  <td>
                    <button type="button" data-fee-id="{{ $c->fee }}" data-name-id="{{ $c->name }}"  class=" btn enroll">
                        <span class="btn btn-primary">Enroll</span>
                    </button>
                 </td>
                </tr>
                 @endforeach
              </tbody>
          </table>
          @else
          <div class="">
            <h3 class="p-2 text-center rounded bg-danger text-dark">There is no opening course</h3>
          </div>
        @endif
          <div class="mt-2 float-end">
            {{ $course->appends(request()->query())->links() }}
          </div>
    </div>
</div>
@endsection


@section('script')
<script>
    
    $(document).ready(function(){
         $('.enroll').click(function(){

             var courseFee = $(this).data('fee-id');
             var courseName = $(this).data('name-id');
             var userId = $('#userId').val();

             $data = {
                 userId: userId,
                 courseFee: courseFee,
                 courseName: courseName
             };

            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/user/ajax/course/enroll',
                data: $data,
                dataType: 'json',
                success: function(response){
                    console.log(response);

                }
            });
        });
    });

 </script>
@endsection




