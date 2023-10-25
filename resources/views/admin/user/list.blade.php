@extends('admin.layouts.source')

@section('source')
<div class="container">
    <style>
        .align-middle {
            vertical-align: middle;
        }
    </style>
    <div class="mt-2">
        <h3 class="text-center">User List</h3>
    </div>
    {{-- <div class="float-end me-4"><h5>Total - {{ $user->total() }}</h5></div> --}}

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

       <table class="table table-striped ">
        <thead class="table-dark">
            <tr scope="row">
              <th>Name</th>
              <th>Email</th>
              <th>Image</th>
              <th>Gender</th>
              <th>Age</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Created Date</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

             @foreach ($user as $u)
             <tr scope="row">
             <th class="align-middle">{{ $u->name }}</th>
             <th class="align-middle">{{ $u->email }}</th>
             <th>
                @if ($u->image == null)
                @if ($u->gender == 'male')
                    <img class="img-thumbnail shadow-sm" style=" height:100px; width:120px;" src="{{ asset('image/user.png') }}"  />
                @else
                    <img class="img-thumbnail shadow-sm" style=" height:100px; width:120px;" src="{{ asset('image/girl.png') }}"  />


                @endif

            @else
            <img src="{{ asset('storage/'.$u->image ) }}" style="height: 70px; width: 100px" class=" text-center img-thumbnail" alt="">
            @endif

             </th>
             <th class="align-middle text-center">{{ $u->gender }}</th>
              <td class="align-middle ">{{ $u->age }}</td>
              <td class="align-middle">{{ $u->address }}</td>
              <td class="align-middle">{{ $u->phone }}</td>
              <td class="align-middle">{{ $u->created_at->format('j-F-y') }}</td>
              <td class="align-middle">
                <a href="{{ route('user#userDetail',$u->id) }}"><i class="fa-solid fa-circle-info text-dark me-3" title="detail"></i> </a>
                <a href="{{ route('user#delete',$u->id) }}"><i class="fa-solid fa-trash-can text-dark me-3" title="delete"></i></a>

              </td>
            </tr>
             @endforeach

          </tbody>
      </table>
          {{-- <div class="mt-2 float-end">
            {{ $user->links() }}
          </div> --}}
    </div>
</div>
@endsection

