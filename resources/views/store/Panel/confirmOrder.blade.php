@extends('layouts.storepanel')

@section('title', 'Products')
@section('content')

    <div class="container my-5 pt-5">

        <div class="row">
            <div class="col-8">
                <div class="rounded-4 overflow-hidden my-2">
                    <table class="table text-center rounded-3">
                        <thead>
                            <tr>
                                <th scope="col">List des produits </th>
                                <th scope="col">Prix unitaire TTC</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Total TTC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="d-flex  justify-content-start">
                                    <img class="col-3 shadow-sm bg-white" width="40" height="100"
                                        src="{{ asset('img/PRO.png') }}" alt="payement methode">
                                    <div>
                                        <h6>Télécommande multifonctions filaire 4 vitesses Aldes pour InspirAlR@Home SC</h6>
                                        <p>Fabricant : Aldes</p>
                                        <p>Ref: 11023334</p>
                                    </div>
                                </td>
                                <td>2500DA</td>
                                <td>2</td>
                                <td>5000DA</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h6>Total_TTC</h6>
                                </td>
                                <td>
                                    <h6>10000DA</h6>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>


                <div class="rounded-3 bg-white client-info ">
                    <h4 class="p-2 my-1">paiement</h4>
                    <div class="separate m-0"></div>

                    <div class="p-3 my -2">
                        <div class="row py-2">
                            <div class="col-3">
                                <p>Montant payée</p>
                                <h6>5000 DA</h6>
                            </div>
                            <div class="col-3">
                                <p>Montant restante</p>
                                <h6>5000 DA (50%)</h6>
                            </div>
                            <div class="col-6">
                                <p>Ajouter montant</p>
                                <form class="d-flex row store-form align-items-center rounded-3">
                                    <input type="text" placeholder="search..." class="bg-light px-2 py-1 border-0 col-8">
                                    <button class="primary border-0 px-2 mx-1 rounded-2 py-1 col-3">Ajouter</button>
                                </form>
                            </div>
                        </div>
                        <form class="row py-3">
                            <h6 class="py-2">Ajouter un Délai de paiement</h6>
                            <div class="col-3">
                                <input type="date" class="px-2 py-1 bg-light border-0 rounded my-2" id="quantity"
                                    name="quantity">
                            </div>
                            <div class="col-4">
                                <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="quantity"
                                    name="quantity" placeholder="ex: 25000DA ou 20%">
                            </div>
                            <div class="col-3">
                                <select name="boutique" id="boutique" class="px-2 py-1 bg-light border-0 rounded my-2">
                                    <br>
                                    <option value="" selected>Pourcentage</option>
                                    <option value="">Valeur</option>
                                </select>

                            </div>
                            <div class="col-2">
                                <button class="primary border-0 px-4 mx-1 py-1 rounded-3  my-2">Ajouter</button>
                            </div>
                        </form>
                    </div>
                    <div class="p-3 ">
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-end justify-content-between">

                                <div class="d-flex ">
                                    <div>
                                        <p class="m-0">Montant</p>
                                        <h6>2 000 DA (30%)</h6>
                                    </div>
                                    <div class="ms-4">
                                        <p class="m-0">dernier délai</p>
                                        <h6>12/01/2024</h6>
                                    </div>
                                </div>
                                <div>
                                    <button class="primary border-0 px-4 py-1 rounded-3  "> Valider</button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-end justify-content-between">

                                <div class="d-flex">
                                    <div>
                                        <p class="m-0">Montant</p>
                                        <h6>2 000 DA (30%)</h6>
                                    </div>
                                    <div class="ms-4">
                                        <p class="m-0">dernier délai</p>
                                        <h6>12/01/2024</h6>
                                    </div>
                                </div>
                                <div>
                                    <button class="primary border-0 px-4 py-1 rounded-3  "> Valider</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>





            </div>

            <div class="col-4  p-0">
                <div class="rounded-3 bg-white client-info ">
                    <h4 class="p-2 my-1">informations de commande</h4>
                    <div class="separate m-0"></div>

                    <div class="p-3">
                        <div>
                            <p class="m-0">Nº de commande</p>
                            <h6>6415616</h6>
                        </div>
                        <div>
                            <p class="m-0">Etat de commande</p>
                            <h6>active</h6>
                        </div>
                        <div>
                            <p class="m-0">Date</p>
                            <h6>12/02/2024 - 15:14</h6>
                        </div>
                        <div>
                            <p class="m-0">Initiateur</p>
                            <h6>username username</h6>
                        </div>
                        <div>
                            <p class="m-0">Client</p>
                            <h6>username username</h6>
                        </div>
                        <div>
                            <p class="m-0">Numero de telephone</p>
                            <h6>1234567890</h6>
                        </div>
                        <div>
                            <p class="m-0">Address de livraison</p>
                            <h6>Alger</h6>
                        </div>
                    </div>
                </div>


                <div class="rounded-3 bg-white client-info my-3 p-3 d-flex justify-content-center">
                    <button class="col-12 px-2 primary py-2 rounded-3 border-0"> <img src="{{ asset('img/icons/bon.png') }}"
                            alt=""> bon / facture</button>
                </div>

                <div class="rounded-3 bg-white client-info ">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <h4 class="p-2 my-1">Notes</h4>
                        <button class="bg-transparent border-0">
                            <img src="{{ asset('img/icons/note.png') }}" alt="Note" height="22">
                        </button>

                    </div>

                    <div class="separate m-0"></div>

                    <div class="p-3">
                        <div class="border rounded-3 bg-light ">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <h6 class="p-2 my-1">15/02/2024</h6>
                                <button class="bg-transparent border-0">
                                    <i class="bi bi-trash-fill text-danger"></i>
                                </button>
                            </div>


                            <div class="separate m-0"></div>
                            <p class="p-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula iaculis lectus quis
                                aliquet. Nullam scelerisque commodo tortor, nec ornare nibh porta at.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
