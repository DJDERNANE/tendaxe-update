@extends('layouts.storepanel')

@section('title', 'Ajouter Produit')
@section('content')

    <div class="bg-white rounded-3 container  my-5   p-4 ">
        <form action="" class="fs-5 my-4 ">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="my-4 col-12">
                            <label for="name" class="my-2">Nom de Boutique:</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="name"
                                name="name">
                        </div>

                        <h6>Mot de Passe</h6>
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <label for="" class="fs-6">Mot de Passe actuel</label> 
                            <input placeholder="**********" type="text" class="px-2 py-1 bg-light border-0 rounded my-2">
                        </div>
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <label for="" class="fs-6">nouveau mot de passe</label> 
                            <input placeholder="**********"  type="text" class="px-2 py-1 bg-light border-0 rounded my-2">
                        </div>
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <label for="" class="fs-6">Confirmez le mot de passe</label> 
                            <input placeholder="**********"  type="text" class="px-2 py-1 bg-light border-0 rounded my-2">
                        </div>

                        <h6 class="mt-4 mb-3">couleur de charte</h6>
                        <div class="col-12 d-flex  mx-2">
                            <div class="colors rounded">

                            </div>
                            <div class="colors rounded">

                            </div>
                            <div class="colors rounded">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12">
                        <div>
                            <label for="">Logo : </label>
                            <input type="file" name="photo">
                        </div>
                    </div>
                </div>
       
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="primary rounded-3 py-1 px-5 border-0"> Valider </button>
                </div>



            </div>


        </form>
    </div>

@endsection
