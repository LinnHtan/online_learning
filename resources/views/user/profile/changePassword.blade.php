@extends('user.layouts.source')

@section('source')
<div class="">
    <div class=" card p-4  col-4 offset-4 mt-5 " >
        <div class="card-title text-center fs-3">Change Password Page</div>
        @if (session('changeSuccess'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('changeSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <form method="POST" action="{{ route('profile#userChange') }}">
            @csrf
            <div class="mt-2">
                <label for="" class="mb-2">Old Password</label>
                <input type="password" name="oldPassword" class="form-control @if(session('notMatch')) is-invalid @endif  @error('oldPassword') is-invalid @enderror " placeholder="Enter old password...">
                @error('oldPassword')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
                @if (session('notMatch'))
                <div class="invalid-feedback">
                    {{ session('notMatch') }}
                </div>
                @endif
            </div>

            <div class="mt-4">
                <label for="" class="mb-2">New Password</label>
                <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror " placeholder="Enter new password...">
                @error('newPassword')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mt-4">
                <label for="" class="mb-2">Confirmation Password</label>
                <input type="password" name="confirmationPassword" class="form-control @error('confirmationPassword') is-invalid @enderror " placeholder="Enter confirmation password...">
                @error('confirmationPassword')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>

            <div class=" float-end mt-4">

                <button class="btn btn-primary " type="submit" >
                   Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


