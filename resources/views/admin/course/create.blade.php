@extends('admin.layouts.source')

@section('source')
<div class="container">

    <div class=" col-6 offset-3 mt-5 bg-info bg-opacity-10 border border-info  rounded p-2" border>
        <div class=" row">
            <h4 class="text-center text-dark">Create Opening Course</h4>
            <hr>
        </div>
        @if (session('CreateSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('CreateSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
       <form action="{{ route('course#createCourse') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class=" offset-2 col-8  mt-1">
            <div class="">
                <label for="" class="text-dark my-2">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter course name...">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="">
                <label for="" class="text-dark my-2">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror " id="" placeholder="Enter course description ..."></textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="">
                <label for="" class="text-dark my-2">Category Name</label>
                <select name="categoryName" class="form-control @error('categoryName') is-invalid @enderror" id="">
                    <option value="">Choose Category</option>
                   @foreach ($category as $c)
                   <option value="{{ $c->id }}">{{ $c->name }}</option>
                   @endforeach

                </select>
                @error('categoryName')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="">
                <label for="" class="text-dark my-2">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="">
                <label for="" class="text-dark my-2">Class Duration</label>
                <input type="text" name="classDuration" class="form-control @error('classDuration') is-invalid @enderror" placeholder="Enter class duration...">
                @error('classDuration')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="text-dark my-2">Class Fee</label>
                <input type="text" name="classFee" class="form-control @error('classFee') is-invalid @enderror" placeholder="Enter class fee...">
                @error('classFee')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="offset-10 my-2">
                <button class="btn btn-primary text-dark " type="submit">Create</button>
            </div>
        </div>
       </form>
    </div>
</div>
@endsection
