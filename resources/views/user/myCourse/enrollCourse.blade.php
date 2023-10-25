@extends('user.layouts.source')

@section('source')
<div class="container">
    <style>
        .align-middle {
            vertical-align: middle;
        }
    </style>
    <div class="mt-2">
        <h3 class="text-center">Enroll Courses</h3>

    </div>
   <div class="">

    <form action="{{ route('enrollCourse#page') }}" method="get">
    <div class="d-flex">
        <div class="offset-1"><h5>Total - {{ $enrollList->total() }}</h5></div>
            @csrf
            <input type="text" name="searchKey" class="form-control col-2 offset-6" placeholder="Search..."><button class="text-white btn btn-dark" type="submit">Search</button>
    </div>
</form>
   </div>
    <div class="mt-5 col-10 offset-1">
        @if (count($enrollList) != 0)
        <table class="table table-striped ">
            <thead class="table-dark">
                <tr scope="row">
                  <th >Name</th>
                  <th >Image</th>
                  <th>Status</th>
                  <th>Class Fee</th>
                  <th>Created Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                 @foreach ($enrollList as $e)

                 <tr scope="row">
                 <td class="align-middle">{{ $e->course_name }}</td>
                 <td>
                   @if ($e->course_image)
                   <img src="{{ asset('storage/'.$e->course_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                   @elseif ($e->popular_image)
                   <img src="{{ asset('storage/'.$e->popular_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                   @elseif ($e->up_coming_image)
                   <img src="{{ asset('storage/'.$e->up_coming_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                   @elseif ($e->free_image)
                   <img src="{{ asset('storage/'.$e->free_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                   @endif
                 </td>
                 <td class="align-middle">
                    @if ($e->status == 0)
                    <span class="text-warning" ><i class="fa-solid text-warning fa-hourglass-end me-2"></i>Pending</span>
                    @elseif ($e->status == 1)
                    <span class="text-success" ><i class="fa-solid text-success fa-check me-2"></i>Accepted</span>
                    @elseif  ($e->status == 2)
                    <span class="text-danger" ><i class="fa-solid text-danger fa-xmark me-2"></i>Rejected</span>
                    @endif
                </td>
                  @if ($e->free_image)
                  <td class="align-middle"><strong>Free</strong></td>
                  @else
                  <td class="align-middle">{{ $e->fee }}</td>
                  @endif
                  <td class="align-middle">{{ $e->created_at->format('j-F-y') }}</td>
                </tr>
                 @endforeach
              </tbody>
          </table>
          @else
          <div class="">
            <h3 class="p-2 text-center rounded bg-danger text-dark">There is no enroll course</h3>
          </div>
        @endif
          <div class="mt-2 float-end">
            {{ $enrollList->appends(request()->query())->links() }}
          </div>
    </div>
</div>
@endsection





