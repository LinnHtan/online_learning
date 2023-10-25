@extends('user.layouts.source')

@section('source')
<div class="container">
    <style>
        .align-middle {
            vertical-align: middle;
        }
    </style>
    <div class="mt-2">
        <h3 class="text-center">My Free Course</h3>

    </div>
    <div class="mt-5 col-10 offset-1">
         @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (count($free) != 0)
        <table class="table table-striped ">
            <thead class="table-dark">
                <tr scope="row">
                    <th >Name</th>
                    <th >Image</th>
                    <th>Description</th>
                    <th>Class Duration</th>
                    <th>Created Date</th>
                   <th></th>
                </tr>
              </thead>
              <tbody>

                 @foreach ($free as $m)

                 <tr scope="row">
                    <td class="align-middle">{{ $m->course_name }}</td>
                    <td>
                      <img src="{{ asset('storage/'.$m->free_image ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">

                    </td>

                    <td class="align-middle">
                        {{ $m->free_description }}

                    </td>

                    <td class="align-middle">
                        {{ $m->free_time }}

                    </td>
                     <td class="align-middle">{{ $m->created_at->format('j-F-y') }}</td>

                   </tr>
                 @endforeach
              </tbody>
          </table>
          @else
          <div class="">
            <h3 class="p-2 text-center rounded bg-danger text-dark">There is no course</h3>
          </div>
        @endif
          <div class="mt-2 float-end">
            {{ $free->appends(request()->query())->links() }}
          </div>
    </div>
</div>
@endsection









