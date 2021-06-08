<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        body {
    font-family: 'Nunito' ;
    }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    
    <title>@yield('title')</title>
    

</head>

<body>

    {{-- navbar --}}

    <nav class="row navbar-light bg-light p-3">
        {{-- logo --}}
        
        <a class="navbar-brand col-1" href="/">
            TUMBAS
        </a>
    {{-- end logo --}}

     {{-- search bar --}}

        <div class="col">

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
            </div>    
            
        </div>

        {{-- end search bar --}}

        {{-- chart/register  --}}

                <?php 
                
                if (Auth::check()) {

                    ?>
                    <div class="col-1">

                        <button type="button" class="btn btn-primary"> chart</button>

                    </div> 

                    <?php
                }

                else {
                    ?>
                    <div class="col-1">

                        <button class="btn btn-primary" onclick="location.href='/register';"; >Register</button>

                    </div> 

                    <?php
                }

               
                ?>



                {{-- end chart/register --}}

                {{-- login --}}

                
                <?php 
                
                if (Auth::check()) {

                    ?>
                    <div class="col-1">

                        {{-- <form action="/logout" method="post">
                            @csrf                             --}}
                            <button type="button" class="btn btn-primary" onclick="location.href='/logout';";> {{ Auth::user()->name}}</button>
                            
                        {{-- </form> --}}

                    </div> 

                    <?php
                }

                else {
                    ?>

                <div class="col-1">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login" id="loginform"  >login</button>

                <form method="get" action="/login">

                    @csrf
                    
                    <div class="modal fade" id="login" >
                        
                        <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">                                        
                                    <div class="modal-header">
                                    <h5 class="modal-title" >Login</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body"> 

                                    <div class="mb-3">
                                        <input name="email" type="text" class="form-control
                                        @if($errors->all())                        
                                        is-invalid
                                        @endif                                         
                                        " placeholder="Email">

                                    </div>
                                    <div class="mb-3">
                                        <input name="password" type="password" class="form-control
                                        
                                        @if($errors->all())                        
                                        is-invalid
                                        @endif    

                                        " placeholder="Password">
                                        
                                        @if($errors->all())                        
                                        <div class="invalid-feedback">
                                            Wrong Email or Password
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                
                            </div>

                        </div>

                    </div>

                </form>     


                    </div> 

                    <?php
                }

               
                ?>

                
                {{-- end login --}}

    </nav>


    {{-- endnavbar --}}

    @yield('body')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    @if($errors->all())
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#login').modal('show');
            });
    </script>
    @endif
</body>

</html>