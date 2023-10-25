@extends('admin.layouts.source')

@section('source')
<div class="container">
    <div class="col-10 offset-1 mt-5">
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
        <table class="table table-striped">
            <thead class="table-dark">
                <tr scope="row">
                  <th >Id</th>
                  <th >Name</th>
                  <th >Created_at</th>
                  <th>Updated_at</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                 @foreach ($category as $c)
                 <tr scope="row">
                 <th>{{ $c->id }}</th>
                  <td>{{ $c->name }}</td>
                  <td>{{ $c->created_at->format('j-F-y') }}</td>
                  <td>{{ $c->updated_at->format('j-F-y') }}</td>
                  <td>
                    <a href="{{ route('category#editPage' ,$c->id) }}"><i class="fa-solid fa-pen text-dark me-3" title="edit"></i></a>
                    <a href="{{ route('category#delete',$c->id) }}"><i class="fa-solid fa-trash-can text-dark me-3" title="delete"></i></a>

                  </td>
                </tr>
                 @endforeach

              </tbody>
          </table>
    </div>
</div>
@endsection
