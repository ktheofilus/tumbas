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
            Cart
        </p>

        @if ($errors->all())
            <p class="h5 text-danger fw-bolder border border-3 border-start-0 border-end-0">
                {{$errors->first()}}
            </p>
        @endif

        <?php $total=0 ?>

        @if(empty($items))

        @foreach ($items as $item)

        <?php $total += $item->price; ?>
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
                            <a href="/deletecart/{{$item->id}}" class="btn btn-danger flex">Delete</a>
                        </div>

                    </div>
                        
                </div>                    
            </div>

            
        @endforeach

        @endif

        @if($total>0)

        <div class="card-footer text-end h5 ">Total : Rp.<?= $total; ?></div>

        <form method="POST" action="/checkout" id="checkout">@csrf</form>

        <button form="checkout" class="btn btn-success flex">Check Out!</button>
            
        @else

        <p class="h3 fw-bolder border border-3 border-start-0 border-end-0">
            Keranjang Kosong! <br>
            Masukan beberapa barang ke keranjangmu!
        </p>
            
        @endif


        
    </div>
    
@endsection
