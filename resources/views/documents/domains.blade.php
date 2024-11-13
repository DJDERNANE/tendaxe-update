@extends('layouts.storelayout')

@section('title', 'Dcuments')

@section('styling')
   
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/allDomains.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
@endsection
@section('content')
<div class="mt-0 mt-md-5 pt-5">
        
        <!-- start button scroll to top -->

        <button class="scroll-top" id="scrollToTopBtn">
            <i class="bi bi-arrow-up"></i>
        </button>

        <!-- end button scroll to top -->



        <!-- start allDomains page head -->

        <div class="allDomains-head page-head pt-4">
            <div class="container">
                <div class="page-head-wrapper">
                    <h2 class="page-head-title">cahier des charges (exemplaire)</h2>
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

        <!-- end allDomains page head -->



        <!-- start section : all-domains -->

        <section class="all-domains">
            <div class="container">
                <div class="row">
                    @foreach ($domains as $item)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a href="{{ route('domain.show', $item->id) }}" class="box-document-folder-link">
                            <i class="bi bi-folder2-open"></i>
                            <h6 class="domaine-name">{{$item->name}}</h6>
                        </a>
                    </div>  
                    @endforeach
                
                </div>
              
            </div>
        </section>

        <!-- end section : all-domains -->

    </div>
@endsection