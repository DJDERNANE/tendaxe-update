@extends('layouts.storelayout')

@section('title', 'Creer votre store')

@section('content')
    <div class="container main">
        <h2 class="bold text-center pt-4">Créez votre boutique en ligne</h2>

        <form class="bg-white border px-4 pt-3 rounded my-5" method="POST" action="{{ route('store.save') }}"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom de Boutique</label>
                        <input class="form-control bg-light" type="text" name="storeName"
                             required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Secteur d'activitees</label>
                        <select class="form-control bg-light" name="secteur" id="">
                            @foreach($cats as $secteur)
                                <option value="{{$secteur->id}}">{{$secteur->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Logo de Boutique</label>
                        <input class="form-control bg-light" type="file" name="logo"
                             required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Couverture</label>
                        <input class="form-control bg-light" type="file" name="cover"
                             required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Wilaya</label>
                        <input class="form-control bg-light" type="text" name="wilaya"
                             required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Region</label>
                        <input class="form-control bg-light" type="text" name="region"
                             required>
                    </div>
                </div>

                
                
               
            </div>
            <div class="form-group text-right">
                <button class="btn btn-primary">Soumettre</button>
            </div>
        </form>

    </div>

@endsection