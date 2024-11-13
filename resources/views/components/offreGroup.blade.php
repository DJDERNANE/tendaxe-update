@props(['offre' => $offre])

<div class="my-2">
    <div class="bg-white px-3 pt-3 border rounded">
        <div class="row">
            <div class="col-9 col-md-10 font-weight-600">
               {{ $offre->titre }}
            </div>
            <div class="col-3 col-md-2 text-right">
        
                    @if ($offre->adminetab->category !== "AUTRE")
                        <img class="" src="{{ asset('img/1.png') }}" width="50px">
                    @else
                        <img class="rounded-circle" src="{{ asset('storage/logo/'.$offre->adminetab->logo) }}" width="50px">
                    @endif
              

            </div>
        </div>
            <div class="mt-3 mt-md-2" style="font-size: 88%;">
                <div class="mb-2">
                    <span class="font-weight-600">Annonceur: </span>
                  
                        {{ $offre->adminetab->nom_etablissement }}   
                   
                </div>
                <div class="mb-2">
                    <span class="font-weight-600">Statut: </span>
                    {{ $offre->statut }}
                </div>
                @if ($offre->wilaya)
                    <div class="mb-2">
                        <span class="font-weight-600">Wilaya: </span>
                       
                            {{ $offre->wilaya }}
                     
                    </div>
                @endif

            </div>
            <div class="mb-2 d-flex">
                <div>
                    <a href="{{ route('detail', $offre) }}" class="btn btn-sm btn-primary px-3 ml-auto">Triter</a>
                    <a href="{{ route('participer', $offre) }}" class="btn btn-sm btn-primary px-3 ml-auto p-0 ">V Group <i class="bi bi-microsoft-teams" style="font-size: 20px"></i></a>
                </div>
            </div>
        
    </div>
</div>