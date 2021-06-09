<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        *{
    font-family: 'Nunito' ;
    }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    
    <title>@yield('title')</title>
    

</head>

<body>

    {{-- navbar --}}
    <nav class="navbar-light bg-light pt-2">
        
        <div class="container">

            <div class="row">
        
        
            {{-- logo --}}
            
            <a class="navbar-brand col " href="/" id="title">
                TUMBAS
            </a>
            {{-- end logo --}}
            
            {{-- search bar --}}
            
            <div class="col-9">
                
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
                    <div class="col">
                        
                        <button type="button" class="btn btn-primary"> chart</button>
                        
                    </div> 
                    
                    <?php
                }
                
                else {
                    ?>
                    <div class="col">
                        
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
                    <div class="col">

                        <button class="btn btn-primary" onclick="location.href='/profile';"; >Profile</button>
                       
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileform" id="profilebtn"  >Profile</button>

                        <div class="modal fade" id="profileform" style="position:absolute" >
            
                            <div class="modal-dialog">  

                                <div class="modal-content"> 

                                    <div class="modal-header">
                                        <h5 class="modal-title" >{{Auth::user()->name}}</h5>
                                    </div>

                                    <div class="modal-body">
                                        <p>Saldo : {{Auth::user()->balance}}</p>
                                    </div>
                                    
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="location.href='/logout';";> Logout</button>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div> --}}
                            
                    </div> 
                        
                        <?php
                }
                
                else {
                    ?>

    <div class="col">
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginform" id="loginbtn"  >login</button>
        
        <form method="get" action="/login">
            
            @csrf
            
            <div class="modal fade" id="loginform" >
                
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
        </div>
    </div>

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
            $('#loginform').modal('show');
        });
    </script>
    @endif

    {{-- @if(Auth::check())
    
    <script type="text/javascript">
        $("#profilebtn").hover(function () {
            $('#profileform').modal('show');
        });
    </script>

    @endif --}}

</body>

</html>