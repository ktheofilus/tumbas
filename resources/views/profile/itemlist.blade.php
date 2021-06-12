@extends('/template/mainprofile')


@section('profilecontainer')
    <style>
        .clickable-row{
    cursor:pointer;
    }
    </style>

    <script>
        $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
    </script>

    <div class="row p-3">
        <p class="h1 fw-bolder border border-3 border-start-0 border-end-0">
            Item List
        </p>

        @foreach ($items as $item)

            

            <div class="card my-2" style="height: 100px;">
                <div class="row my-2" style="height: auto">
                    <div class="row  clickable-row" data-href='/item/{{$item->id}}'>

                        <div class="col-1">
                            <img src="/images/{{$item->photo}}" class="card-img-top img-responsive" alt="...">
                        </div>

                        <div class="col">
                            <div class="row">
                                <h5 class="title">{{$item->itemname}}</h5>
                            </div>   
                            <div class="row">
                                <h5 class="title">Rp. {{$item->price}}</h5>
                            </div>
                        </div>
                        <div class="col-1">
                            <form action="/deleteitem/{{$item->id}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger flex">Delete</button>
                            </form>
                        </div>

                    </div>
                        
                </div>                    
            </div>

            
        @endforeach

    
    
@endsection
