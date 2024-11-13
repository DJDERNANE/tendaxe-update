@extends('layouts.storelayout')

@section('title', 'Dcuments')

@section('styling')

    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/allDocuments.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        .section-title-docs {
            text-align: start
        }
    </style>
@endsection
@section('content')
    <div class="mt-0 mt-md-5 pt-5">


        <!-- start button scroll to top -->

        <button class="scroll-top" id="scrollToTopBtn">
            <i class="bi bi-arrow-up"></i>
        </button>

        <!-- end button scroll to top -->



        <!-- start documents page head -->

        <div class="documents-head page-head pt-4">
            <div class="container">
                <div class="page-head-wrapper">
                    <h2 class="page-head-title">documents</h2>
                    <div class="serach-upload">
                        <div class="search">
                            <form class="form-search">
                                <input class="form-control" type="search" placeholder="Recherche..." aria-label="Search">
                                <button class="btn btn-search" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </div>
                        <a href="{{route('specifications.create')}}" class="upload-link">
                            <i class="bi bi-upload"></i>
                            <span>importer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- end documents page head -->



        <!-- start section : useful-documents -->

        <section class="useful-documents">
            <div class="container">
                <h3 class="section-title section-title-docs useful-documents-title">documents utiles</h3>
                <div class="row">
                    @foreach ($docs as $item)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="box-document">
                                <a href="{{route('specification.show', $item->id)}}" class="document-link">
                                    <div class="paper-folded">
                                        <img src="images/document-face.jpg" alt="" class="document-face-thumbnail">
                                    </div>
                                    <h6 class="document-name">{{ $item->title }}</h6>
                                </a>
                                <div class="document-actions">
                                    <div class="btns-wrapper">
                                        <button class="btn-action btn-share" data-bs-toggle="tooltip"
                                            data-bs-placement="top"data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Partager">
                                            <i class="bi bi-share"></i>
                                        </button>
                                        <a href="{{ asset('pictures/Specifications/' . $item->image) }}"
                                            class="btn-action btn-download" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Télécharger"
                                            download="{{ $item->image }}">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        <button class="btn-action btn-print" data-bs-toggle="tooltip"
                                            data-bs-placement="top"data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Imprimer">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </div>
                                    <a href="{{route('specification.show', $item->id)}}" class="view-document-link" data-bs-toggle="tooltip"
                                        data-bs-placement="top"data-bs-custom-class="custom-tooltip" data-bs-title="Lire">
                                        <i class="bi bi-book"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <a href="{{ route('specifications.utils') }}" class="view-more">
                    <span>voir plus</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </section>

        <!-- end section : useful-documents -->


        <!-- start section : specifications -->

        <section class="specifications">
            <div class="container">
                <h3 class="section-title specifications-title section-title-docs">cahier des charges (exemplaire)</h3>
                <div class="row">
                    @foreach ($domains as $item)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="{{ route('domain.show', $item->id) }}" class="box-document-folder-link">
                                <i class="bi bi-folder2-open"></i>
                                <h6 class="domaine-name">{{ $item->name }}</h6>
                            </a>
                        </div>
                    @endforeach


                </div>
                <a href="{{ route('domains.index') }}" class="view-more">
                    <span>voir plus</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </section>

        <!-- end section : specifications -->






        <!-- start section : administrative-monitoring -->

        <section class="administrative-monitoring">
            <div class="container">
                <h3 class="section-title section-title-docs administrative-monitoring-title">veille administratifs</h3>
                <div class="row">
                    @foreach ($veille as $item)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="box-document">
                                <a href="{{route('specification.show', $item->id)}}" class="document-link">
                                    <div class="paper-folded">
                                        <img src="images/document-face.jpg" alt="" class="document-face-thumbnail">
                                    </div>
                                    <h6 class="document-name">{{ $item->title }}</h6>
                                </a>
                                <div class="document-actions">
                                    <div class="btns-wrapper">
                                        <button class="btn-action btn-share" data-bs-toggle="tooltip"
                                            data-bs-placement="top"data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Partager">
                                            <i class="bi bi-share"></i>
                                        </button>
                                        <a href="{{ asset('pictures/Specifications/' . $item->image) }}"
                                            class="btn-action btn-download" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Télécharger" download="{{ $item->image }}">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        <button class="btn-action btn-print" data-bs-toggle="tooltip"
                                            data-bs-placement="top"data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Imprimer">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </div>
                                    <a href="{{route('specification.show', $item->id)}}" class="view-document-link" data-bs-toggle="tooltip"
                                        data-bs-placement="top"data-bs-custom-class="custom-tooltip" data-bs-title="Lire">
                                        <i class="bi bi-book"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <a href="{{ route('specifications.veille') }}" class="view-more">
                    <span>voir plus</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </section>

    </div>

@endsection
