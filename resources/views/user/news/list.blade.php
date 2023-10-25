@extends('user.layouts.source')

@section('source')
<div class="container">
    <div class="">
        <h3 class="text-center mt-3 shadow-sm">Update message From Admin!</h3>
    </div>
    <div class="col-10 offset-1 mt-3">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr scope="row">
                  <th >No</th>
                  <th >Subject</th>
                  <th>Message</th>
                  <th >Created_at</th>
                  <th>Updated_at</th>

                </tr>
              </thead>
              <tbody>

                 @foreach ($message as $m)
                 <tr scope="row">
                 <th>{{ $m->id }}</th>
                  <td>{{ $m->subject }}</td>
                  <td>{{ $m->message }}</td>
                  <td>{{ $m->created_at->format('j-F-y') }}</td>
                  <td>{{ $m->updated_at->format('j-F-y') }}</td>

                </tr>
                 @endforeach

              </tbody>
          </table>
    </div>
</div>
@endsection
