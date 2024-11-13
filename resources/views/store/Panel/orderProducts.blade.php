@extends('layouts.storepanel')

@section('title', 'Products')
@section('content')

    <div class="container my-5 pt-5">

        <div class="row">
            <div class="col-8">
                <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow ">
                    <div>
                        <img src="{{ asset('img/icons/user.png') }}" alt=""> {{$user->nom}}  {{$user->prenom}}
                    </div>
                    <div
                        class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
                        <form class="d-flex bg-light store-form align-items-center p-2 rounded-3">


                            <input type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                            <button class="px-2 border-0  bg-transparent"><i
                                    class="bi bi-search text-primary text-black fs-5 "></i></button>


                        </form>

                    </div>
                </div>
                <table class="table text-center ">
                    <thead>
                        <tr>
                            <th scope="col">Ref</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Marque</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Remise</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $item)
                        <tr>
                            <td>{{$item->ref}}</td>
                            <td> <img class="col-3 shadow-sm bg-white" width="40" height="40"
                                src="{{ asset('pictures/Products/'.$item->picture) }}" alt="payement methode">Otto</td>
                            <td>{{$item->brand->name}}</td>
                            <td> {{$item->price}} DA</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->discount}}%</td>
                            <td>
                                <button class=" rounded fs-5 border-0 primary text-white p-1">
                                    Ajouter
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
            
            <div class="col-4 rounded-3 bg-white panier p-0">
                <h3 class="p-2 my-1">Produits Ajoutés</h3>
                <div class="separate m-0"></div>

                <div class="card-item p-3">
                    <div class="d-flex align-items-center">
                        <img class="mr-2"  src="{{ asset('img/PRO.png') }}" alt="" height="70" width="70">
                        <p class="fs-3 ms-2">Otto </p>

                    </div>
                    <h5>15000 DA</h5>
                    <div>
                        <div class="d-flex jusitify-content-between">
                            <button class='col-2 text-center'>-</button>
                            <input class='col-7 text-center' value="Qte: 2" name='qte' />
                            <button class='col-2 text-center'>+</button>
                        </div>
                        <button class="border-0 bg-transparent fs-3">
                            <i class="bi bi-x-circle-fill text-danger"></i>
                        </button>
                    </div>
                    
                </div>

                <div class="d-flex justify-content-center">
                    <a href="{{route('order.confirm')}}">
                        <button class="btn primary rounded-3 fs-5 create-order col-11  my-2">
                            Créer Commande
                        </button>
                    </a>
                   
                </div>
               
            </div>
        </div>


    </div>
@endsection
