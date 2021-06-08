<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container pt-4">

        <a class="navbar-brand col-1" href="/">
            TUMBAS
        </a>

        <div class="row">

            
            <div class="col-4"></div>
        
            
            <form method="post" action="{{ route('register') }}" class="col-4">
                
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                
                @csrf
                
                <div class="row">
                    
                    <div class="col mb-3">
                        <input name="firstname" type="text" class="form-control
                        @if($errors->get('firstname'))
                        
                        is-invalid
                        @endif 
                        " placeholder="First name" aria-label="First name" >
                        @if($errors->get('firstname'))

                        <div class="invalid-feedback">
                            {{implode($errors->get('firstname'))}}
                        </div>

                        @endif
                        
                    </div>
                    
                    <div class="col">
                        <input name="lastname" type="text" class="form-control
                        @if($errors->get('lastname'))
                        is-invalid
                        @endif
                        " placeholder="Last name" aria-label="Last name">
                        @if($errors->get('lastname'))

                        <div class="invalid-feedback">
                            {{implode($errors->get('lastname'))}}
                        </div>

                        @endif
                    </div>
                </div>
                
                <div class="mb-3">
                    <input name="email" type="text" class="form-control
                    @if($errors->get('email'))
                    is-invalid
                    @endif
                    " placeholder="Email">
                    @if($errors->get('email'))

                        <div class="invalid-feedback">
                            {{implode($errors->get('email'))}}
                        </div>
                        
                    @endif
                </div>


                <div class="mb-3">
                    <input name="password" type="password" class="form-control
                    @if($errors->get('password'))
                    is-invalid
                    @endif
                    " placeholder="Password">
                    @if($errors->get('password'))

                        <div class="invalid-feedback">
                            {{implode($errors->get('password'))}}
                        </div>
                        
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
                
            </form>

            <div class="col-4"></div>
            
        </div>
        
    </div>
        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>

    
