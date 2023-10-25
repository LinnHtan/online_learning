<!DOCTYPE html>
<html >
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            body {
                font-family: Figtree, sans-serif;
                font-feature-settings: normal;
                margin: 0;
                padding: 0;
                background-image: url('{{ asset('image/background.jpg') }}');
                background-size:cover;
                background-repeat:no-repeat;
            }

        </style>
    </head>
    <body >
        <div class="d-flex justify-content-end mt-4 ">
            <a href="{{ route('auth#loginPage') }}" id="link" class="  fs-4 bg-dark rounded text-white shadow-sm  text-dark text-decoration-none p-2 me-2">Log in</a>
            <a href="{{ route('auth#registerPage') }}" id="link" class="  fs-4 bg-dark rounded text-white shadow-sm  text-dark text-decoration-none p-2 me-3">Register</a>
                </div>
        </div>
       <div class="col-7 offset-6">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
              <h3 class="card-title mb-3"> <strong>Online Learning Platform</strong> </h3>
              <h5 class="card-subtitle mb-4 text-body-secondary">Join Us Now!</h5>
              <p class="card-text">Start Your Learning Journey Today With Us!</p>

            </div>
          </div>
       </div>
    </body>
</html>
