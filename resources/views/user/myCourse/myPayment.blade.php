@extends('user.layouts.source')

@section('source')
<div class="container">
    <style>
        .align-middle {
            vertical-align: middle;
        }
    </style>
    <div class="mt-2">
        <h3 class="text-center">Course Payment Section</h3>

    </div>

   {{-- <div class="">
    <div class=""><h5>Total - {{ $course->total() }}</h5></div>
    <form action="{{ route('open#courseList') }}" method="get">
    <div class="d-flex">

            @csrf
            <input type="text" name="searchKey" class="form-control col-2 offset-9" placeholder="Search..."><button class="text-white btn btn-dark" type="submit">Search</button>

    </div>
</form>
   </div> --}}

    <div class="mt-5 col-10 offset-1">
         @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (count($payment) != 0)
        <table class="table table-striped ">
            <thead class="table-dark">
                <tr scope="row">
                    <th >Name</th>
                    <th >Image</th>
                    <th>Description</th>
                    <th>Class Duration</th>
                    <th>Class Fee</th>
                    <th>Created Date</th>
                   <th></th>
                </tr>
              </thead>
              <tbody>

                 @foreach ($payment as $m)

                 <tr scope="row">
                    <td class="align-middle">{{ $m->course_name }}</td>
                    <td>
                      @if ($m->course_image)
                      <img src="{{ asset('storage/'.$m->course_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                      @elseif ($m->popular_image)
                      <img src="{{ asset('storage/'.$m->popular_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                      @elseif ($m->up_coming_image)
                      <img src="{{ asset('storage/'.$m->up_coming_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                      @elseif ($m->free_image)
                      <img src="{{ asset('storage/'.$m->free_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                      @endif
                    </td>

                    <td class="align-middle">
                        @if ($m->course_description)
                        {{ $m->course_description }}

                        @elseif($m->popular_description)
                        {{ $m->popular_description }}

                        @elseif($m->up_coming_description)
                        {{ $m->up_coming_description }}

                        @else
                        {{ $m->free_description }}
                        @endif
                    </td>

                    <td class="align-middle">
                        @if ($m->course_time)
                        {{ $m->course_time}}

                        @elseif($m->popular_time)
                        {{ $m->popular_time}}

                        @elseif($m->up_coming_time)
                        {{ $m->up_coming_time }}

                        @else
                        {{ $m->free_time }}
                        @endif
                    </td>
                     @if ($m->free_image)
                     <td class="align-middle"><strong>Free</strong></td>
                     @else
                     <td class="align-middle">{{ $m->fee }}</td>
                     @endif
                     <td class="align-middle">{{ $m->created_at->format('j-F-y') }}</td>
                     <td class="align-middle">
                        @if ($m->free_image)
                        @else
                        <a href="{{ route('payment#paymentPage',$m->id) }}">
                            <button class="btn btn-primary ">Payment</button>
                        </a>
                        @endif
                     </td>
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
            {{ $payment->appends(request()->query())->links() }}
          </div>
    </div>
</div>
@endsection









