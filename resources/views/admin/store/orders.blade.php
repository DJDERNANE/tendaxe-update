@extends('layouts.adminStorePanel')

@section('title', 'orders')
@section('content')
    <div class="container my-5 pt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <h6><a href="" class="me-2 active">Orders</a> </h6>
                
            </div>
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
                    <th scope="col">id</th>
                    <th scope="col">user</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Total</th>    
                    <th scope="col">Details</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <th scope="row">{{ $item->user->nom }} {{ $item->user->prenom }}</th>
                        <th scope="row">{{ $item->user->phone }}</th>
                        <th scope="row">{{ $item->user->email }}</th>
                        <th scope="row">{{ $item->total_price }}</th>
                        <td>
                            <a href="{{route('orders.details', $item->id)}}">
                                <button class="border-0 btn btn-primary">
                                    Details
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

@endsection
