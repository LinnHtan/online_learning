@extends('admin.layouts.source')

@section('source')
<div class="main-content mt-5">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-title mb-3">
                        <h3 class="text-center t">Account Info</h3>
                    </div>
                    <div class="card-body">
                        <hr>
                        <div class="row">
                            <div class="col-3 offset-1">
                                <div class="image">
                                    <a href="#">
                                        @if (Auth::user()->image == null)
                                            <img
                                               class=" img-thumbnail" style="width: 430px; height:260px"  src="{{ asset('image/' . (Auth::user()->gender == 'male' ? 'user.png' : 'girl.png')) }}" />
                                        @else
                                            <img class=" img-thumbnail" style="width: 430px; height:260px" src="{{ asset('storage/' . Auth::user()->image) }}"
                                                />
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 offset-2">
                                <h4 class="my-3 shadow-sm"><i class="fa-solid fa-file-signature me-4"></i>{{ Auth::user()->name }}</h4>
                                <h4 class="my-3 shadow-sm"><i class="fa-solid fa-envelope me-4"></i>{{ Auth::user()->email }}</h4>
                                <h4 class="my-3 shadow-sm"><i class="fa-solid fa-phone me-4"></i>{{ Auth::user()->phone }}</h4>
                                <h4 class="my-3 shadow-sm"><i class="fa-solid fa-mars-and-venus me-4"></i>{{ Auth::user()->gender }}</h4>
                                <h4 class="my-3 shadow-sm"><i class="fa-solid fa-location-dot me-4"></i>{{ Auth::user()->address }}</h4>
                                <h4 class="my-3 shadow-sm"><i class="fa-regular fa-calendar me-4"></i>{{ Auth::user()->created_at->format('j-F-y') }}</h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4 offset-5">
                                <a href="{{ route('profileAdmin#editPage') }}">
                                    <button class="btn bg-dark text-white">
                                        <i class="fa-solid fa-file-pen me-3"></i>Edit Profile
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
