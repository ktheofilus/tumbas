@extends('/template/mainprofile')


@section('profilecontainer')

    <div class="row p-3">
        <p class="h1 fw-bolder border border-3 border-start-0 border-end-0">
            Cart
        </p>

            
        @foreach ($items as $item)
            <div class="card my-2 h-100" style="height: 100px;">
                <div class="row my-2" style="height: auto">
                    <div class="row">

                        <div class="col-1">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($item->photo)) }}" class="card-img-top img-responsive" alt="...">
                        </div>
                        <div class="col">
                            
                            <div class="row">
                                <h5 class="title">{{$item->itemname}}</h5>
                            </div>   
                            <div class="row">
                                <h5 class="title">{{$item->price}}</h5>
                            </div>  
                        </div>
                        
                    </div>
                        
                </div>                    
            </div>
        @endforeach


        
    </div>
    
@endsection
