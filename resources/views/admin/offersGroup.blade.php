@extends('layouts.panel')

@section('title', 'list offers')

@section('content')
    <div class="text-center h3">List offers</div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="bg-white p-3">
        @foreach ($offres as $offre)
            <x-offre-group :offre="$offre" />
        @endforeach
		{{ $offres->links() }}
        <!-- delete modal -->

    @endsection
