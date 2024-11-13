@extends('layouts.adminStorePanel')

@section('title', 'Contact')

@section('content')

<div class="col-12 col-md-12 col-lg-8 mx-auto my-4" >
    <form class="bg-white border px-4 pt-3 p-4 rounded" method="POST" action="{{ route('contact.store') }}" style="margin-top: 100px">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control bg-light" type="text" name="nom" value="{{$contact->name}}" readonly >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sujet</label>
                    <input class="form-control bg-light" type="text" name="subject" value="{{$contact->subject}}" readonly>
                </div>
            </div>
            <div class="col-md-6 form-group">
                <label>Email</label>
                <input class="form-control bg-light" type="email" name="email" readonly value="{{$contact->email}}">
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Telephone</label>
                    <input class="form-control bg-light" type="text" name="phone" value="{{$contact->phone}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <label>Paye</label>
                    <input class="form-control bg-light" type="paye" name="paye" readonly value="{{$contact->paye}}">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <label>Region</label>
                    <input class="form-control bg-light" type="region" name="region" readonly value="{{$contact->region}}">

                </div>
            </div>

            <div class="col-12">
                <div class="form-group">

                    <label>Message</label> <br>

                    <textarea class="form-control bg-light" name="message" id="" cols="30" rows="5">{{$contact->message}}</textarea>
                </div>
            </div>
    </form>
</div>

@endsection

