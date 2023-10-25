@extends('admin.layouts.source')

@section('source')
 <div class="container mt-5">
    <div class="col-5 offset-3 bg-secondary p-2 rounded shadow-sm">
        <form action="{{ route('category#create') }}" method="post">
            @csrf
            <div class="">
                <div class="mt-3">
                    <h4 class="text-center text-dark mt-2">Create Course Category</h4>
                </div>
                @if (session('createSuccess'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('createSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                    <div class="">
                        <label for="" class="mt-5 text-dark">Category Name</label>
                        <input type="text" class="form-control my-2 @error('categoryName') is-invalid @enderror" name="categoryName" placeholder="Enter Category Name . . .">
                        @error('categoryName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="mt-4 mb-3 col-2 offset-10">
                        <button type="submit" class="btn btn-dark text-white ">Create</button>
                    </div>
            </div>
        </form>
    </div>
 </div>
@endsection

