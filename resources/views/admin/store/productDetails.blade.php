@extends('layouts.adminStorePanel')

@section('title', 'Edit Produit')
@section('content')
    <div class="bg-white rounded-3 container my-5  p-4 ">
        <h3>Edit Produit</h3>
        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data"
            class="fs-5 my-4 addproduct">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="my-4 col-6">
                            <label for="name" class="my-2">Nom de produit:</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="name"
                                value="{{ $product->name }}" name="name">
                        </div>
                        <div class="my-4 col-6  ">
                            <label for="ref" class="my-2">Reference:</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="ref"
                                value="{{ $product->ref }}" name="ref">
                        </div>

                        <div class="my-4 col-6">
                            <label for="boutique">Boutique</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="ref"
                                value="{{ $product->store->storeName }}" name="boutique" readonly>
                        </div>
                        <div class="my-4 col-6">
                            <label for="boutique">Valeur</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="ref"
                                value="{{ $product->valeur }}" name="valeur" >
                        </div>
                        <div class="col-5">
                            {{-- <br>
                            <br>
                            <div class="d-flex jusify-content-start align-items-center">
                                afficher la boutique <input type="checkbox" name=""
                                    style="width: min-content; margin-left:10px">
                            </div> --}}

                        </div>
                        <div class="my-4 col-10">
                            <label for="quantity" class="my-2">Quantite:</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="quantity"
                                        name="qty" value="{{ $product->quantity }}">
                                </div>
                                {{-- <div class="col-4 px-2 my-2 d-flex justify-content-between aligni-items-center">
                                    <button class="btn btn-danger rounded-3 " style="height: 40px"> Soustraire</button>
                                    <button class="btn primary " style="height: 40px">Ajouter</button>
                                </div> --}}


                            </div>

                        </div>

                        <div class="my-4 col-6">
                            <label for="price" class="my-2">Prix:</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="price"
                                name="price" value="{{ $product->price }}">
                        </div>
                        <div class="my-4 col-6 ">
                            <label for="remise" class="my-2">Remise:</label> <br>
                            <input type="number" class="px-2 py-1 bg-light border-0 rounded my-2" id="remise"
                                name="discount" min="0" value="{{ $product->discount }}">
                        </div>
                        <div id="dateremise">
                            <div class="my-4 col-6">
                                <label for="debut" class="my-2">Debut:</label> <br>
                                <input type="date" class="px-2 py-1 bg-light border-0 rounded my-2" id="debut"
                                    name="debut">
                            </div>
                            <div class="my-4 col-6  ">
                                <label for="fin" class="my-2">Fin:</label> <br>
                                <input type="date" class="px-2 py-1 bg-light border-0 rounded my-2" id="fin"
                                    name="fin">
                            </div>
                        </div>

                        <div class="my-4 col-6">
                            <label for="cat">Categories</label>
                            <select name="cats[]" id="categories" multiple>
                                @foreach ($cats as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>   
                        </div>

                        <div class="my-4 col-12">
                            <label for="brand">Marque : </label>
                            <div class="row">
                                <div class="col-9">
                                    <select name="brand" id="brand" class="px-2 py-2 bg-light border-0 rounded my-2">
                                        <br>
                                        <option value="" selected>Selectionner</option>
                                        @foreach ($brands as $item)
                                            @if ($item->id = $product->brand_id)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col-3">
                                    <button class="px-4 py-2 my-2 btn primary ">Autre</button>
                                </div>
                                <div class="col-12">
                                    <div class="my-4 col-12">
                                        <label for="nameMarque" class="my-2">Nom de Marque:</label> <br>
                                        <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2"
                                            id="name" name="Marque">
                                    </div>
                                    <div class="my-4 col-12">
                                        <label for="logo">Logo</label>
                                        <input type="file" name="logo" id="logo">
                                    </div>
                                </div> --}}

                            </div>


                        </div>
                    </div>


                </div>
                <div class="col-4">
                    <div class="col-12">
                        <div class="my-3">
                            <label for="">Image : </label> <br>
                            <img width="200" height="100" class=" my-2"
                                src="{{ asset('pictures/Products/' . $product->picture) }}" alt="photo">
                            <input type="file" name="picture">
                        </div>
                        <div>
                            <label for="">Gallery : </label> <br>
                            @foreach ($product->pictures as $item)
                                <img width="80" height="80" class=" m-2"
                                    src="{{ asset('pictures/Products/pictures/' . $product->picture . '/' . $item->path) }}"
                                    alt="photo">
                            @endforeach
                            <input type="file" name="gallery[]" multiple>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <label for="desc"> Description</label> <br>
                    <textarea name="desc" id="desc" rows="8" class="col-12 my-2 rounded-3 p-2" placeholder="text ... ">{{ $product->primary_desc }}</textarea>
                </div>
                <div class="col-12 my-4">
                    <label for="details"> Description Detaile</label><br>
                    <textarea name="details" id="details" rows="8" class="col-12 my-2 rounded-3 p-2" placeholder="text ... ">{{ $product->full_desc }}</textarea>
                </div>

                <div class="col-12 my-4">
                    <label for="files"> Fichiers joints</label> <br>
                    <input type="file" name="files[]" multiple id="files" class="my-2 ">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="primary rounded-3 py-1 px-5 border-0"> Valider </button>
                </div>



            </div>


        </form>
    </div>

@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const remiseValue = document.querySelector('#remise');
            const remiseDate = document.querySelector('#dateremise');
            if (remiseValue.value > 0) {
                remiseDate.style.display = 'flex';
            } else {
                remiseDate.style.display = 'none';
            }

            remiseValue.addEventListener('change', function() {
                if (remiseValue.value > 0) {
                    remiseDate.style.display = 'flex';
                } else {
                    remiseDate.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#details'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        new MultiSelectTag('categories', {
            rounded: true, // default true
            shadow: true, // default false
            placeholder: 'Search', // default Search...
            tagColor: {
                textColor: '#327b2c',
                borderColor: '#92e681',
                bgColor: '#eaffe6',
            },
            onChange: function(values) {
                console.log(values)
            }
        })
    </script>

@endsection
