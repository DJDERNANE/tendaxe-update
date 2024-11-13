@extends('layouts.adminStorePanel')

@section('title', 'Boutiques')
@section('content')

    <div class="container my-5 pt-5">
        <div class="col-sm-12 mt-2">
            <form class="bg-white border px-4 pt-3 rounded" method="POST" action="{{ route('admin.store.edit', $store->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nom de Boutique</label>
                            <input class="form-control bg-light" type="text" name="nom" value="{{$store->storeName}}" required>
                        </div>
                    </div>
                    <div class="my-4 col-12">
                        <label for="boutique">Valeur</label> <br>
                       <input  class="px-2 py-1 bg-light border-0 rounded my-2" type="text" name="valeur" value='{{$store->valeur}}'>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label>Changer Logo</label>
                            <input class="form-control bg-light" type="file" name="logo"  >
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label>Changer Couverture</label>
                            <input class="form-control bg-light" type="file" name="cover"  >
                        </div>
                    </div>
                </div>
                <div class="form-group text-right my-4">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
