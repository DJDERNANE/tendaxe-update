@extends('layouts.storepanel')

@section('title', 'Alerts')
@section('content')
<div class="container alerts-type   p-4">
    <button type="button" class="btn primary px-4 " >
        <a class="text-white" href="">Paiement</a>
    </button>
    
    <button type="button" class="btn primary px-4 ms-4" >
        <a class="text-white " href="">Quantite</a>
    </button>

   
</div>
    <div class="bg-white rounded-3 container     p-4 ">
        
          <div class="alert alert-success" role="alert">
            This is a success alert—check it out!
          </div>
          <div class="alert alert-danger" role="alert">
            This is a danger alert—check it out!
          </div>
          <div class="alert alert-warning" role="alert">
            This is a warning alert—check it out!
          </div>
        
        
      
    </div>

@endsection
