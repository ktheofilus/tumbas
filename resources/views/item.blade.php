@extends('template/main')

@section('title','Home')

@section('body')

    <div class="container">

        <div class="row">
            <div class="col-4 pt-4">
                <img src="/images/{{$item->photo}}" class="img-fluid border border-5 rounded" alt="...">
            </div>

            <div class="col-5 pt-4">

                {{-- judul --}}
                <div class="row">
                    <div class="col">
                        <p class="h2 fw-bold"> {{$item->itemname}}</p>
                    </div>
                </div>
                {{-- end judul --}}

                {{-- harga --}}
                <div class="row">
                    <div class="col">
                        <p class="h1 fw-bolder">
                            Rp. {{$item->price}}
                        </p>
                    </div>
                </div>
                {{-- end harga --}}

                {{-- description --}}
                <div class="row">
                    <div class="col">
                        <div class="col border border-2 border-start-0 border-end-0">
                            Description
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{$item->description}}
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-3 pt-4">
                <div class="card" style="width: 18rem;">
                
                <div class="card-body">
                    <h5 class="card-title">Beli</h5>
                    <div class="row">
                        <div class="col">
                            <a href="/buy/{{$item->id}}" class="btn btn-primary flex">Beli</a>
                        </div>

                        <div class="row">                            
                            <div class="col">
                                <a href="/addtocart/{{$item->id}}" class="btn btn-success">Keranjang</a>
                            </div>
                        </div>

                    </div>
                    
                    
                    
                </div>
                </div>
            </div>

        </div>


        
    </div>

@endsection

    

   