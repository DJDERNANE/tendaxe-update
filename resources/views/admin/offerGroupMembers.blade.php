@extends('layouts.panel')

@section('title', 'list offers')

@section('content')
    <div class="text-center h3">Members</div>

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
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                   
                    <th scope="col">Nom Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Entrprise</th>
                    <th scope="col">Wilaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                      
                        <td>{{$user->nom }} {{$user->prenom }}</td>
                        <td>{{$user->email }}</td>
                        <td>{{$user->phone }}</td>
                        <td>{{$user->nom_entreprise }}</td>
                        <td>{{$user->wilaya }}</td>
                    </tr>
                @endforeach


            </tbody>
            
        </table>
        <a href="{{ route('grouped', $offre) }}" class="btn btn-sm btn-primary px-3 ml-auto">Triter</a>
    @endsection
