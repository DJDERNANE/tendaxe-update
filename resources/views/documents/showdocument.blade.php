@extends('layouts.storelayout')

@section('title', 'Dcuments')

@section('styling')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/documentDetails.css') }}">
 <!-- custom css -->
 <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
@endsection
@section('content')
<div class="mt-0 mt-md-5 pt-5">
          <!-- start section : documentDetails -->

          <section class="documentDetails pt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-9">
                        <div class="document-details-wrapper h-100">
                            <h2 class="document-title">{{$specification->title}}</h2>
                            <p class="document-desc">
                                {{$specification->title}}
                            </p>
                            <div class="document-actions">
                                <div class="btns-wrapper">
                                    <button class="btn-action btn-share" data-bs-toggle="tooltip" data-bs-placement="top"data-bs-custom-class="custom-tooltip" data-bs-title="Partager">
                                        <i class="bi bi-share"></i>
                                    </button>
                                    <button class="btn-action btn-print" data-bs-toggle="tooltip" data-bs-placement="top"data-bs-custom-class="custom-tooltip" data-bs-title="Imprimer">
                                        <i class="bi bi-printer"></i>
                                    </button>
                                    <button class="btn-action btn-favorite" data-bs-toggle="tooltip" data-bs-placement="top"data-bs-custom-class="custom-tooltip" data-bs-title="Ajouter au favoris">
                                        <i class="bi bi-star-fill"></i>
                                    </button>
                                </div>
                                <a href="{{ asset('pictures/Specifications/' . $specification->image) }}"
                                    class="btn-action btn-download" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Télécharger"
                                    download="{{ $specification->image }}">
                                    <i class="bi bi-download"></i>
                                    <span>télécharger</span>
                                </a>
                            </div>
                            <embed src="{{asset('pictures/Specifications/' . $specification->image)}}"   style="width: 100%" height="800" type="application/pdf">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-3">
                        <div class="sidebar">
                            <h4 class="similar-documents-title">
                                documents similaires
                            </h4>
                            <div class="boxes-document-wrapper">
                                @foreach ($docs as $item)
                             
                                <div class="box-document">
                                    <a href="{{route('specification.show', $item->id)}}" class="document-link">
                                        <div class="paper-folded">
                                            <img src="images/document-face.jpg" alt="" class="document-face-thumbnail">
                                        </div>
                                        <div class="box-document-text">
                                            <h5 class="document-name">{{$item->title}}</h5>
                                            <h6 class="domain-name">domaine</h6>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                
                            
                            </div>
                            <button class="view-more d-lg-none">
                                <span>voir plus</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end section : documentDetails -->

    </div>
@endsection
