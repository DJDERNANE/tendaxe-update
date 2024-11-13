@extends('layouts.adminStorePanel')

@section('title', 'Facteurs Proforma')
@section('content')

    <div class="container my-5 pt-5">
        <div>
            <b>Nom  : </b> {{$facteurProforma->fName}} {{$facteurProforma->Lname}}
        </div>
        <div>
            <b>Email : </b> {{$facteurProforma->email}}
        </div>
        <div>
            <b>Phone : </b> {{$facteurProforma->phone}}
        </div>

        <div>
            <b>Raison :</b> {{$facteurProforma->raison}}
        </div>
        
<div>
            <b>paye : </b> {{$facteurProforma->contry}}
        </div>
        <div>
            <b>Region : </b> {{$facteurProforma->region}}
        </div>

        <div>
            <b>Desription  : </b><br>{{$facteurProforma->desc}}
        </div>
    </div>
@endsection
