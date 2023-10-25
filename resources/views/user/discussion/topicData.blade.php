@extends('user.layouts.source')

@section('source')
@if (session('success'))
<div class="alert alert-primary col-8 offset-2 alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="col-8 offset-2">
    <a href="{{ route('topic#page') }}">
        <i class="fa-solid fs-4 text-dark fa-arrow-left"></i>
    </a>
</div>
<div class="container col-8 offset-2  shadow-sm bg-secondary rounded "  >


    @if ($topicData)

        <h5 class="text-dark p-3">{{ $topicData->title }}</h5>
        <h6 class="text-dark">{{ $topicData->content }}</h6>

    @else
    <p>Topic not found.</p>
    @endif

   <hr>
   <h5 class="text-dark text-center my-2">Comments</h5>

   <div class="" style="max-height:300px; overflow-y: auto;">
    @foreach ($comment as $c)
        <p><strong class="my-2 text-dark">{{ $c->user_name }} :</strong> <span class="text-dark">{{ $c->body }}</span></p>
    @endforeach
    </div>


    @auth
    <form method="POST" action="{{ route('comment#data') }}">
        @csrf
        <div class="form-group">
            <input type="hidden" name="user" value="{{ Auth::user()->id }}" >
           <input type="hidden" name="topicId" value="{{ $topicData->id }}">
            <label for="">Comment</label>
            <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" rows="3" placeholder="Add a comment"></textarea>
            @error('comment')
            <div class="invalid-message">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Post Comment</button>
    </form>
    @else
    <p>You must be logged in to post a comment.</p>
    @endauth
</div>
@endsection

