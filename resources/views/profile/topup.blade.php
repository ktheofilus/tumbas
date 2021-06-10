@extends('/template/mainprofile')


@section('profilecontainer')

    <div class="row p-3">
        <p class="h1 fw-bolder border border-3 border-start-0 border-end-0">
            Top Up
        </p>

        <form action="/topup" method="POST">
            @csrf
            
            <div class="row ">

                
                
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp. </span>
                    <input name="nominal" type="text" class="form-control
                    @if($errors->get('nominal'))                        
                        is-invalid
                    @elseif($errors->all())                    
                        is-valid
                    @endif
                    " placeholder="100.000"  autocomplete="off">

                    @if($errors->get('nominal'))

                        <div class="invalid-feedback">
                            {{implode($errors->get('nominal'))}}
                        </div>

                    @elseif($errors->all())                    
                        <div class="valid-feedback">
                            {{$errors->first()}}
                        </div>
                    @endif

                </div>                 
                               
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-1 mx-3">

                    <button type="submit" class="btn btn-primary">Topup</button>
                </div>
             </div>

            
        </form>
        
    </div>
    
@endsection
