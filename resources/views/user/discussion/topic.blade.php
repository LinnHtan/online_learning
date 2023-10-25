@extends('user.layouts.source')

@section('source')
<div class="container">
   <div class="row m-3">
    <div class="col-5">
        <h4 class="text-center">Create New Topic</h4>
        @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <form method="POST" action="{{ route('create#topic') }}">
            @csrf
            <input type="hidden" name="user" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="">Topic Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Topic Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="5"></textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Discussion</button>
        </form>
       </div>


       <div class="col-7" style="height: 600px; overflow-y: auto;">
        @if (count($topic) != 0)
        <h4 class="text-center">Discussion Forum</h4>
        @foreach ($topic as $t)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name - {{ $t->user_name }}</h5>
                <p class="card-text"><strong>{{ $t->title }}</strong></p>
                <p class="card-text">{{ $t->content }}</p>
                <a href="{{ route('topic#dataPage',$t->id) }}" class="btn btn-primary">View Discussion</a>
            </div>
        </div>
        @endforeach
        @else
        <h4 class="text-center bg-danger p-1 rounded mt-2">There is no topic</h4>
           @endif
    </div>

   </div>
</div>

@endsection

