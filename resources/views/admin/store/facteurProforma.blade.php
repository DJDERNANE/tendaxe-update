@extends('layouts.adminStorePanel')

@section('title', 'Facteurs Proforma')
@section('content')

    <div class="container my-5 pt-5">
        <div  class="d-flex justify-content-between align-items-center">
            <h3>Facteurs Proforma</h3>
            <div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    {{-- <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Category</h5>
                            </div>
                            <div class="modal-body">
                                <form  class="  store-form align-items-center p-2 rounded-3" method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nom : </label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Photo : </label>
                                        <input class="form-control" type="file" name="picture" >
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>

                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
                
            </div>
            
        </div>
        
        <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow ">
            <div
            class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
            <form class="d-flex bg-light store-form align-items-center p-2 rounded-3">

              
                <input type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                <button class="px-2 border-0  bg-transparent"><i class="bi bi-search text-primary text-black fs-5 "></i></button>


            </form>
     
        </div>
           
           
        </div>
        <table class="table text-center ">
            <thead>
              <tr>
                <th scope="col">Raison</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($facteurs as $item)
            <tr>
                <th scope="row">{{$item->raison}}</th>
                <td>{{$item->fName}} {{$item->lName}}</td>
                <th scope="row">{{$item->email}}</th>
                <th scope="row">{{$item->phone}}</th>
                <th scope="row">
                    <a href="{{route('facture.show', $item->id)}}">
                        <button class="btn btn-primary">
                            Voir
                        </button>
                    </a>
                </th>
              </tr>
            @endforeach
             
            
            </tbody>
          </table>
    </div>
@endsection
