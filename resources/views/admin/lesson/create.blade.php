@extends('admin.layouts.source')

@section('source')
    <div class="container">
      <div class="card col-6 offset-3 my-3">
        <form action="{{ route('lesson#create') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class=" ">
                <div class="">
                    <div class="">
                        <h4 class="text-center  my-3">Create Sample Lesson</h4>
                    </div>
                    <label for="" class="my-2 text-muted">Please Select Sample Lesson</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror mt-2 mb-4">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <button class="btn btn-dark col-12 my-2">Create</button>
                </div>
            </div>
           </form>
           <div class="">
            <a href="{{ route('lesson#sample') }}" >
                <button  class="btn btn-info my-2 col-12 ">Detail</button>
            </a>
           </div>
      </div>
    </div>
@endsection

