@extends('user.layouts.source')
@section('source')


<div class="container">
    <form action="{{ route('payment#sendPayment') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($isPaid)
        <div class="mt-3">
            <h3 class="text-center text-danger "><strong>You already paid for this class</strong></h3>
        </div>
        @endif
    <div class="row col-8 offset-2 mt-3 bg-secondary bg-opacity-50 border border-secondary  rounded p-2" border>
        <div class="" >
            <a href="{{ route('myPayment#page') }}" class="text-dark text-decoration-none m-1" ><i class=" fs-5 fa-solid fa-arrow-left"></i></a>
        </div>

            <div class=" row">
                <h4 class="text-center text-dark">Payment Page</h4>
                <hr>
            </div>
            <div class="col-4 ms-4  mt-3">


               @if ($course->course_image)
               <img src="{{ asset('storage/'.$course->course_image ) }}" style="height: 250px; width: 250px; " class="align-middle img-thumbnail" alt="">
               @elseif ($course->popular_image)
               <img src="{{ asset('storage/'.$course->popular_image ) }}" style="height: 250px; width: 250px; " class="align-middle img-thumbnail" alt="">
               @elseif ($course->up_coming_image)
               <img src="{{ asset('storage/'.$course->up_coming_image ) }}" style="height: 250px; width: 250px; " class="align-middle img-thumbnail" alt="">
               @elseif ($course->free_image)
               <img src="{{ asset('storage/'.$course->free_image ) }}" style="height: 250px; width: 250px; " class="align-middle img-thumbnail" alt="">
               @endif

               @if ($isPaid)
               <button type="submit" disabled  style=" width: 250px; " class="btn btn-dark text-white mt-2">Add to Payment</button>
               @else
               <button type="submit"  style=" width: 250px; " class="btn btn-dark text-white mt-2">Add to Payment</button>
               @endif


            </div>
            <div class="col-6 offset-1  mt-3">

                <div class="">
                    <label for="" class="text-dark my-2">Name</label>
                    <input type="text"  value="{{ old('name', Auth::user()->name) }}" disabled class="form-control">
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">

                </div>
                <div class="">
                    <label for="" class="text-dark my-2">Course Name</label>
                    <input type="text" name="courseName" value="{{ old('courseName', $course->course_name) }}"  class="form-control @error('courseName') is-invalid @enderror">
                    @error('courseName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="">
                    <label for="" class="text-dark my-2">Payment</label>
                    <select name="payment" class="form-control @error('payment') is-invalid @enderror" id="">
                        <option value="">Choose Category</option>
                       @foreach ($payment as $p)
                       <option value="{{ $p->id }}">{{ $p->name }}</option>
                       @endforeach

                    </select>
                    @error('payment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="text-dark my-2">Class Fee</label>
                    <input type="text" name="classFee"  value="{{ old('classFee', $course->fee) }}" class="form-control @error('classFee') is-invalid @enderror">
                    @error('classFee')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

    </div>
</form>
</div>
@endsection
