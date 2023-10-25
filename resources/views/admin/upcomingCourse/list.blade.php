@extends('admin.layouts.source')

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
    <div class="float-end me-4"><h5>Total - {{ $course->total() }}</h5></div>

    <div class="col-12  mt-5">
        @if (session('deleteSuccess'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('deleteSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session('UpdateSuccess'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('UpdateSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
       @if (count($course) != 0)
       <table class="table table-striped ">
        <thead class="table-dark">
            <tr scope="row">
              <th class="col-1">Name</th>
              <th >Image</th>
              <th >Category Id</th>
              <th class="col-3 text-center">Description</th>
              <th>Class Duration</th>
              <th>Class Fee</th>
              <th>Created Date</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

             @foreach ($course as $c)
             <tr scope="row">
             <th class="align-middle col-1">{{ $c->name }}</th>
             <th>
                <img src="{{ asset('storage/'.$c->image ) }}" style="height: 70px; width: 100px" class=" text-center img-thumbnail" alt="">
             </th>
             <th class="align-middle text-center">{{ $c->category_id }}</th>
              <td class="align-middle col-3 text-center">{{ $c->description }}</td>
              <td class="align-middle">{{ $c->time }}</td>
              <td class="align-middle">{{ $c->fee }}</td>
              <td class="align-middle">{{ $c->created_at->format('j-F-y') }}</td>
              <td class="align-middle">
                <a href="{{ route('UpComingCourse#detailPage', $c->id) }}"><i class="fa-solid fa-circle-info text-dark me-3" title="detail"></i> </a>
                <a href="{{ route('UpComingCourse#editPage', $c->id) }}"><i class="fa-solid fa-pen text-dark me-3" title="edit"></i></a>
                <a href="{{ route('UpComingCourse#delete',$c->id) }}"><i class="fa-solid fa-trash-can text-dark me-3" title="delete"></i></a>

              </td>
            </tr>
             @endforeach

          </tbody>
      </table>
      @else
      <div class="">
        <h3 class="text-center text-dark p-2 bg-danger rounded">There is no upcoming course!</h3>
      </div>
       @endif
          <div class="mt-2 float-end">
            {{ $course->links() }}
          </div>
    </div>
</div>
@endsection

