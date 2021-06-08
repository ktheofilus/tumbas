@extends('template/main')

@section('title','Home')

@section('body')

<div class="container">

    <div class="row">

       @foreach ($items as $item)

       <div class="col-2 px-2 py-4 d-flex align-items-stretch">

            <div class="card" style="width:100%;height:auto;">
                <h5 class="card-header card-title">{{$item->itemname}}</h5>
                <div class="card-body">
                    <img src="data:image/png;base64,{{ chunk_split(base64_encode($item->photo)) }}" class="card-img-top img-responsive" alt="...">
                </div>
                <div class="card-body">
                    <p class="card-text" alt="...">{{ $item->description }} </p>
                </div>
                <div class="card-footer">

                    <p class="card-text">Rp. {{$item->price}}</p>
                </div>
                <a href="/items/{{$item->id}}" class="stretched-link"></a>
            </div>
        </div>
           
       @endforeach
    
</div>

@endsection