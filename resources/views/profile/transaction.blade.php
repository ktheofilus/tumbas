@extends('/template/mainprofile')


@section('profilecontainer')

<div class="row pt-3">
    <p class="h1 fw-bolder border border-3 border-start-0 border-end-0">
        Transaction
    </p>

    <div class="row">
        @foreach ($transactions as $transaction)
            <div class="card mb-3" style="height: auto;">
                <?php $total=0; ?>
                <div class="card-header text-end">{{$transaction[0]->created_at}}</div>

                <div class="row m-2" style="height: auto">
                    @foreach ($transaction as $item)
                    <?php 
                    
                    $total += $item->price ?>
                    <div class="row">

                        <div class="card m-2" style="height: auto;">
                            <div class="row p-2">

                                <div class="col-2">
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

                                <a href="/item/{{$item->id}}" class="stretched-link"></a>

                            </div>
                        </div>

                    </div>
                    @endforeach
                        
                </div>
                
                
                
                <div class="card-footer text-end">Total : Rp.<?= $total; ?></div>

            </div>
        @endforeach
    </div>
</div>

@endsection
