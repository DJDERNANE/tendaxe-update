@extends('layouts.adminStorePanel')

@section('title', 'Brands')
@section('content')

<div class="container my-5 pt-5">
    <h1>
        Edit Category
    </h1>
            <div class="modal-body w-80">
              
                <form  class="  store-form align-items-center p-2 rounded-3" method="post" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nom : </label>
                        <input class="form-control" type="text" name="name" value="{{$category->name}}" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="parent_id">Parent : </label>
                        <select class="form-control" name="parent_id" id="parent_id">
                            <option value="">Select Parent</option>
                            <!-- Assuming $categories contains all available categories -->
                            @foreach($categories as $categoryOption)
                                <option value="{{ $categoryOption->id }}" 
                                    @if($categoryOption->id == $category->parent_id) selected @endif>
                                    {{ $categoryOption->name }} <!-- Adjust this to the category name or whatever field is relevant -->
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <br>
                    <div class="form-group">
                        
                        <img class="col-3 mx-auto shadow-sm bg-white" width="50" height="50" src="{{ asset('pictures/Category/'.$category->picture) }}" alt="image">
                        <label for="">Changer la Photo : </label>
                        <input class="form-control" type="file" name="picture" >
                    </div>
                    <div class="form-group">
                        <img class="col-3 mx-auto shadow-sm bg-white" width="50" height="50" src="{{ asset('pictures/Category/Icons/'.$category->icon) }}" alt="image">
                        <label for="">Changer la Photo : </label>
                        <input class="form-control" type="file" name="icon" >
                    </div>
                    <div class="form-group">
                        <label for="">Position : </label>
                        <input class="form-control" type="text" name="position" value="{{$category->position}}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>

               
            </div>
      
</div>    
@endsection
