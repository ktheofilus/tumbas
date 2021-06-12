@extends('/template/main')

@section('title','Profile')

@section('body')

    <div class="container">
        <div class="row">
            <div class="col-3 my-3">
                
                <div class="card" style="width: 100%;">

                    <div class="card-header">
                        {{Auth::user()->name}}<a href="/profile" class="stretched-link"></a>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Saldo:</div>
                                <div class="col text-end">Rp. {{Auth::user()->balance}}</div>
                            </div>
                            <a href="/topup" class="stretched-link"></a>
                        </li>
                        <li class="list-group-item">Cart<a href="/cart" class="stretched-link"></a></li>
                        <li class="list-group-item">Jual Barang<a href="/sell" class="stretched-link"></a></li>
                        <li class="list-group-item">Transaksi Pembelian<a href="/transaction" class="stretched-link"></a></li>
                        <li class="list-group-item text-white bg-danger "> Logout<a href="/logout" class="stretched-link"></a></li>
                    </ul>

                    

                    

                </div>

            </div>

            <div class="col">

                @yield('profilecontainer')

            </div>
        </div>
    </div>


@endsection