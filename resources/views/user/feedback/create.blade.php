@extends('user.layouts.source')

@section('source')

<div class="container">
    <form class="m-5" action="{{ route('feedback#sendData') }}" method="post">
        @csrf
       <div class="shadow-sm border border-dark-subtle rounded-sm offset-3  col-7">
        <div class="">
            <h3 class="text-center my-4">Send FeedBack To Admin</h3>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
             @endif
        </div>
        <div class="row">
            <div class="col-6">
                <label  class="form-label">Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror " placeholder="Enter Your name...">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            <div class="col-6">
                <label  class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " value="{{ Auth::user()->email }}" placeholder="Enter Your email...">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
        </div>
        <div class="col-12">
          <label  class="form-label">Subject</label>
          <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror " id="inputAddress" placeholder="subject..">
          @error('subject')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-12">
          <label  class="form-label">Message</label>
          <textarea  type="text" name="message" class="form-control @error('message') is-invalid @enderror "  placeholder="messages..." id="" cols="30" rows="7"></textarea>
          @error('message')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="my-3">
            <button type="submit" class="btn rounded btn-primary offset-10 col-2">Send</button>
          </div>
       </div>

      </form>

</div>
@endsection

