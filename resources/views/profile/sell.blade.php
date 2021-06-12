@extends('/template/mainprofile')


@section('profilecontainer')

    <div class="p-3">
        
        <p class="h1 fw-bolder border border-3 border-start-0 border-end-0">
            Jual
        </p>

        {{-- @if ($errors->all())
            <p class="h5 text-success fw-bolder border border-3 border-start-0 border-end-0">
                {{$errors->first()}}
            </p>
        @endif --}}

        <div class="row">

            <form action="/sell" method="POST" enctype="multipart/form-data">

                @csrf

            <div class="input-group my-3">
                <input name="itemname" type="text" class="form-control
                @if($errors->get('itemname'))                        
                    is-invalid
                @endif
                " placeholder="Nama Barang">
                @if($errors->get('itemname'))
                    <div class="invalid-feedback">
                        {{implode($errors->get('itemname'))}}
                    </div>
                @endif
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <input name="price" type="text" class="form-control
                @if($errors->get('price'))                        
                    is-invalid
                @endif
                ">
                @if($errors->get('price'))
                    <div class="invalid-feedback">
                        {{implode($errors->get('price'))}}
                    </div>
                @endif
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Deskripsi</span>
                <textarea name="description" class="form-control
                @if($errors->get('description'))                        
                    is-invalid
                @endif
                "></textarea>
                @if($errors->get('description'))
                    <div class="invalid-feedback">
                    {{implode($errors->get('description'))}}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Photo</label>
                <input name="photo" class="form-control
                @if($errors->get('photo'))                        
                    is-invalid
                @endif
                " accept="image/*" type="file" id="formFile">
                @if($errors->get('photo'))
                    <div class="invalid-feedback">
                        {{implode($errors->get('photo'))}}
                    </div>
                @endif
            </div>


            <button class="btn btn-success" style="width: 100%" type="subtmit">Sell</button>
            
            </form>

        </div>
        
    </div>
    
@endsection
