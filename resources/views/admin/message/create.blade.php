@extends('admin.layouts.source')

@section('source')
 <div class="container mt-5">
    <div class="col-5 offset-3 bg-secondary p-2 rounded shadow-sm">
        <form action="{{ route('message#send') }}" method="post">
            @csrf
            <div class="">
                <div class="mt-3">
                    <h4 class="text-center text-dark mt-2">Send Update Message</h4>
                </div>
                @if (session('send'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('send') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                    <div class="">
                        <label for="" class="mt-5 text-dark">Subject</label>
                        <input type="text" class="form-control my-2 @error('subject') is-invalid @enderror" name="subject" placeholder="Enter Subject Name . . .">
                        @error('subject')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="">
                        <label for="" class="mt-5 text-dark">Message</label>
                        <textarea name="message" type="text" class="form-control my-2 @error('message') is-invalid @enderror" id="" cols="20" rows="5" placeholder="Enter message ..."></textarea>
                        @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="mt-4 mb-3 col-2 offset-10">
                        <button type="submit" class="btn btn-dark text-white ">Send</button>
                    </div>
            </div>
        </form>
    </div>
 </div>
@endsection

