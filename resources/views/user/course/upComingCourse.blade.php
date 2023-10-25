@extends('user.layouts.source')

@section('source')
<div class="container">
    <style>
        .align-middle {
            vertical-align: middle;
        }
    </style>
    <div class="mt-2">
        <h3 class="text-center">Upcoming Courses</h3>
    </div>
   <div class="">
    <div class=""><h5>Total - {{ $course->total() }}</h5></div>
    <form action="{{ route('coming#courseList') }}" method="get">
    <div class="d-flex">

            @csrf
            <input type="text" name="searchKey" class="form-control col-2 offset-9" placeholder="Search..."><button class="btn btn-dark text-white" type="submit">Search</button>

    </div>
</form>
   </div>

    <div class="col-12  mt-5">

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
                 <tr scope="row">
                 <th class="align-middle col-1">{{ $c->name }}</th>
                 <th>
                    <img src="{{ asset('storage/'.$c->image ) }}" style="height: 70px; width: 100px; " class=" align-middle  img-thumbnail" alt="">
                 </th>
                 <th class="align-middle ">{{ $c->category_id }}</th>
                  <td class="align-middle ">{{ $c->description }}</td>
                  <td class="align-middle">{{ $c->time }}</td>
                  <td class="align-middle">{{ $c->fee }}</td>
                  <td class="align-middle">{{ $c->created_at->format('j-F-y') }}</td>
                  {{-- <td><button class="btn btn-primary">Enroll</button></td> --}}
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
            <h3 class="text-center p-2 bg-danger text-dark rounded">There is no coming course</h3>
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
                url: 'http://127.0.0.1:8000/user/ajax/coming/enroll',
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

