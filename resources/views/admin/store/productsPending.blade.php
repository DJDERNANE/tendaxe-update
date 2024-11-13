@extends('layouts.adminStorePanel')

@section('title', 'Products')
@section('content')

    <div class="container my-5 pt-5">
        <div  class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
                
                <h6><a href="{{route('products.accepted.all')}}">Accepter</a> </h6>
                <h6><a href="{{route('products.pending.all')}}" class="active ms-2">En Attente</a> </h6>

            </div>
            <a href="{{route('admin.products.create')}}">
                <button class="btn primary ">+ Ajouter</button>
            </a>
        </div>
        
        <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow ">
            <div
            class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
            <form class="d-flex bg-light store-form align-items-center p-2 rounded-3">

              
                <input type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                <button class="px-2 border-0  bg-transparent"><i class="bi bi-search text-primary text-black fs-5 "></i></button>


            </form>
     
        </div>
            <div class="d-flex">
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Marque 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Quantite 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <button class="primary border-0 px-4 mx-1 rounded-3">Filter</button>
            </div>
           
        </div>
        <table class="table text-center ">
            <thead>
              <tr>
                <th scope="col">Boutique</th>
                <th scope="col">Produit</th>
                <th scope="col">Marque</th>
                <th scope="col">Telephone</th>
                <th scope="col">details</th>
                <th scope="col">Accepter</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $item)
              <tr>
                <th scope="row">{{$item->store->storeName}}</th>
                <td> <img class="col-3 shadow-sm bg-white" width="40" height="40" src="{{ asset('pictures/Products/'.$item->picture) }}" alt="payement methode">{{$item->name}}</td>
                <td>{{$item->brand->name ?? 'NO Marque'}}</td>
                <td>{{$item->store->user->phone ?? 'no store'}}</td>
                <td>
                    <a href="{{route('admin.product.edit', $item->id)}}">
                        <button class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </button>    
                    </a>    
                </td>
                <td>
                    <a href="{{route('product.accept',$item->id)}}" >
                        <button class="btn btn-success">
                            <i class="bi bi-patch-check-fill"></i>
                        </button>    
                    </a>  
                  
                </td>
              </tr>
              @endforeach
              
            
            </tbody>
          </table>
    </div>
@endsection
