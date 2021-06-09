@extends('/template/mainprofile')


@section('profilecontainer')

    <div class="p-3">
        
        <p class="h1 fw-bolder">
            Selamat datang, {{Auth::user()->name}}
        </p>
        
    </div>
    
@endsection
