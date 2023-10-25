@extends('admin.layouts.source')

 @section('source')
 <div class="container">
     <div id="carouselExample" class="carousel  slide col-10 offset-1 my-2">
         <div class="carousel-inner">
             @foreach ($sample as $key => $s)
                 <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                     <img src="{{ asset('storage/' . $s->image) }}" class="d-block w-100 shadow-sm rounded" alt="...">
                 </div>
             @endforeach
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="visually-hidden ">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden ">Next</span>
         </button>
     </div>
 </div>
 @endsection
