@extends('user.layouts.source')
@section('source')

 <div class="container">
    <div class="">
        <h3 class="text-center">Lesson Outline</h3>
    </div>
    <div class="row col-12 border border-secondary rounded m-2">
        <div class="left-side col-2 my-2" style="height: 600px; overflow-y: auto;">
            @foreach ($class as $c)
                <div class="">
                    <button class="enlarge-button obje " data-target="image{{ $c->id }}">
                        <label for="" class="d-flex">Lesson {{ $c->id }}</label>
                        <img style="height: 50px; width: 130px;" src="{{ asset('storage/'.$c->image) }}" >
                    </button>
                </div>
            @endforeach
        </div>
        <div class="right-side col-10 my-2  ">
                <img src="{{ asset('storage/'.$class[0]->image) }}" style="height: 600px; width: 1000px;" class="rounded"  alt="">
        </div>
    </div>
</div>



@endsection

@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const enlargeButtons = document.querySelectorAll('.enlarge-button');
            const rightSide = document.querySelector('.right-side');

            console.log('enlargeButtons:', enlargeButtons);
            console.log('rightSide:', rightSide);

            enlargeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const imageSrc = this.querySelector('img').getAttribute('src');
                    const enlargedImage = document.createElement('img');
                    enlargedImage.setAttribute('src', imageSrc);
                    enlargedImage.classList.add('enlarged-image');

                    enlargedImage.style = "width:1000px";
                    enlargedImage.style = "height:600px";


                    console.log('Enlarged image source:', imageSrc);

                    // Clear the rightSide container and add the enlarged image
                    rightSide.innerHTML = '';
                    rightSide.appendChild(enlargedImage);
                });
            });
        });



</script>
@endsection
