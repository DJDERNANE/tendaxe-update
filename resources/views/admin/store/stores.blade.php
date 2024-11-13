@extends('layouts.adminStorePanel')

@section('title', 'Boutiques')
@section('content')

    <div class="container my-5 pt-5">
        <div class="d-flex">
           
            <h6><a href="{{route('stores.accepted')}}" class="me-2">active</a> </h6>
            <h6><a href="{{route('stores.pending')}}" class="active ms-2">en attente</a> </h6>

        </div>

        <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow ">
            <div class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
                <form action="{{route('stores.pending')}}" method="GET" class="d-flex bg-light store-form align-items-center p-2 rounded-3 text-black">
                    @csrf

                    <input name="name" type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                    <button class="px-2 border-0  bg-transparent"><i
                            class="bi bi-search text-primary text-black fs-5 "></i></button>


                </form>

            </div>


        </div>
        <table class="table text-center ">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Nom de Boutique</th>
                    <th scope="col">Logo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $item)
                    <tr>
                        <td>{{ $item->user->nom }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->user->phone }}</td>
                        <td>{{ $item->storeName }}</td>
                        <td> <img class="col-3 shadow-sm bg-white" width="50" height="50"
                                src="{{ asset('pictures/storeLogos/' . $item->logo) }}" alt="image"></td>
                        <td>
                          
                                <a href="{{route('store.active', $item->id)}}">
                                    <button class="btn btn-success">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </button>
                                </a>
                                <a href="{{route('admin.store.show', $item->id)}}">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                          
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
