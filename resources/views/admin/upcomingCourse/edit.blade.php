@extends('admin.layouts.source')

@section('source')
<div class="container">
    <form action="{{ route('UpComingCourse#update',$course->id) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row col-8 offset-2 mt-5 bg-secondary bg-opacity-50 border border-secondary  rounded p-2" border>

            <div class=" row">
                <h4 class="text-center text-dark">Edit Opening Course</h4>
                <hr>
                <div class="" >
                    <a href="{{ route('UpComingCourse#listPage') }}" class="text-dark text-decoration-none m-1" ><i class=" fs-5 fa-solid fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="col-4 ms-4  mt-3">

               <img src="{{ asset('storage/'.$course->image) }}"  style="width: 250px; height: 150px" class="img-thumbnail " alt="">

                <input type="file" style="width: 250px" name="image" class="form-control @error('image') is-invalid @enderror my-2">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <button style="width: 250px" class="btn btn-dark text-white">Update</button>
            </div>
            <div class="col-6 offset-1  mt-3">
                <div class="">
                    <label for="" class="text-dark">Name</label>
                    <input type="text" name="name" value="{{ old('name', $course->name) }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="">
                    <label for="" class="text-dark">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" >{{ old('description', $course->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="">
                    <label for="" class="text-dark">Category Name</label>
                    <select name="categoryName" class="form-control @error('categoryName') is-invalid @enderror" id="">
                        <option value="">Choose Category</option>
                       @foreach ($category as $c)
                       <option value="{{ $c->id }}" @if ($course->category_id == $c->id) selected @endif >{{ $c->name }}</option>
                       @endforeach

                    </select>
                    @error('categoryName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="">
                    <label for="" class="text-dark">Class Duration</label>
                    <input type="text" name="classDuration" value="{{ old('classDuration', $course->time) }}" class="form-control @error('classDuration') is-invalid @enderror">
                    @error('classDuration')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="text-dark">Class Fee</label>
                    <input type="text" name="classFee" value="{{ old('classFee', $course->fee) }}" class="form-control @error('classFee') is-invalid @enderror">
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
