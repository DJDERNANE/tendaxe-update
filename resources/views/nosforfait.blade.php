<section id="offers" class="container my-5">
    <h3 class="font-weight-600 text-center mb-3">Nos forfaits</h3>
    <ul class="font-weight-500">
        <li>
            Consulter tous les types d'annonces proposées (appels d'offres, consultations, annonces de subventions
            temporaires, annonces d'annulation, notifications, annonces de prolongation et de retard des délais, annonce
            d'offres ...)
        </li>
        <li>
            Alerter toutes les offres proposées dans votre secteur privé par e-mail pendant une semaine
        </li>
        <li>
            Ajoutez vos offres gratuitement pour une durée illimitée
        </li>
        <li>
            Consulter les offres les sous-traitences proposés par des entreprises ou les ordinairers.
        </li>
    </ul>
    <div class="row my-4">
        <div class="col-md-4 col-sm-6 p-2" data-aos="fade-up">
            <div class="bg-white mx-auto pb-2 rounded h-100 border d-flex flex-column" style="max-width: 280px">
                <div class="bg-light-gray mb-3 rounded-top" style="height: 6px"></div>
                <div class="text-center bold">Forfait gratuit à vie</div>
                <div class="h1 text-center text-green my-4">0 DA</div>
                <div class="my-2">
                    <ul class="">
                        <li>Découvrez le site pendant une période illimitée sans passer en revue tous les détails</li>
                        <li class="">publiez vos offres et vos appels d'achat d'une façon illimité</li>
                    </ul>
                </div>
                {{-- <div class="text-center mt-auto px-2">
                        <a href="{{ route('register') }}" class="btn btn-primary bold w-100">Demander</a>
                    </div> --}}
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2" data-aos="fade-up" data-aos-duration="700">
            <div class="bg-white mx-auto pb-2 rounded h-100 border d-flex flex-column" style="max-width: 280px">
                <div class="bg-orange mb-3 rounded-top" style="height: 6px"></div>
                <div class="text-center bold">Pack de bronze</div>
                <div class="h1 text-center text-green my-4">
                    <span>11000</span> DA/an
                </div>
                <div class="my-2">
                    <ul class="">
                        <li>Choisissez 1 secteur</li>
                        <li>Un utilisateur</li>
                        <li>Toutes les fonctionnalités énumérées ci-dessus</li>
                    </ul>
                </div>
                <div class="text-center mt-auto px-2">
                    @auth
                        <button class="btn btn-primary bold w-100" data-abonnement="bronze" data-toggle="modal"
                            data-target="#exampleModal">Demander</button>
                    @endauth
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary bold w-100">Demander</a>
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2" data-aos="fade-up" data-aos-duration="900">
            <div class="bg-white mx-auto pb-2 rounded h-100 border d-flex flex-column" style="max-width: 280px">
                <div class="bg-light-gray mb-3 rounded-top" style="height: 6px"></div>
                <div class="text-center bold">pack Silver</div>
                <div class="h1 text-center text-green my-4">
                    <span>17000</span> DA/an
                </div>
                <div class="my-2">
                    <ul class="">
                        <li>Choisissez 3 secteurs</li>
                        <li>Deux utilisateurs</li>
                        <li>Toutes les fonctionnalités énumérées ci-dessus</li>
                    </ul>
                </div>
                <div class="text-center mt-auto px-2">
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary bold w-100">Demander</a>
                    @endguest
                    @auth
                        <button class="btn btn-primary bold w-100" data-abonnement="silver" data-toggle="modal"
                            data-target="#exampleModal">Demander</button>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2" data-aos="fade-up">
            <div class="bg-white mx-auto pb-2 rounded h-100 border d-flex flex-column" style="max-width: 280px">
                <div class="bg-yellow mb-3 rounded-top" style="height: 6px"></div>
                <div class="text-center bold">Pack gold</div>
                <div class="h1 text-center text-green my-4">
                    <span>24000</span> DA/an
                </div>
                <div class="my-2">
                    <ul class="">
                        <li>Choisissez 6 secteurs </li>
                        <li>Trois utilisateurs</li>
                        <li>Toutes les fonctionnalités énumérées ci-dessus</li>
                    </ul>
                </div>
                <div class="text-center mt-auto px-2">
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary bold w-100">Demander</a>
                    @endguest
                    @auth
                        <button class="btn btn-primary bold w-100" data-abonnement="gold" data-toggle="modal"
                            data-target="#exampleModal">Demander</button>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2" data-aos="fade-up" data-aos-duration="700">
            <div class="bg-white mx-auto pb-2 rounded h-100 border d-flex flex-column" style="max-width: 280px">
                <div class="bg-red mb-3 rounded-top" style="height: 6px"></div>
                <div class="text-center bold">pack platine</div>
                <div class="h1 text-center text-green my-4">
                    <span>28000</span> DA/an
                </div>
                <div class="my-2">
                    <ul class="">
                        <li>Choisissez 10 secteurs</li>
                        <li>Trois utilisateurs</li>
                        <li>Toutes les fonctionnalités énumérées ci-dessus</li>
                    </ul>
                </div>
                <div class="text-center mt-auto px-2">
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary bold w-100">Demander</a>
                    @endguest
                    @auth
                        <button class="btn btn-primary bold w-100" data-abonnement="platine" data-toggle="modal"
                            data-target="#exampleModal">Demander</button>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2" data-aos="fade-up" data-aos-duration="900">
            <div class="bg-white mx-auto pb-2 rounded h-100 border d-flex flex-column" style="max-width: 280px">
                <div class="bg-blue mb-3 rounded-top" style="height: 6px"></div>
                <div class="text-center bold">pack ultra</div>
                <div class="h1 text-center text-green my-4">
                    <span>34000</span> DA/an
                </div>
                <div class="my-2">
                    <ul class="">
                        <li>Touts les secteurs</li>
                        <li>Quatre utilisateurs</li>
                        <li>Toutes les fonctionnalités énumérées ci-dessus</li>
                        <li>Assistance juridique</li>
                    </ul>
                </div>
                <div class="text-center mt-auto px-2">
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary bold w-100">Demander</a>
                    @endguest
                    @auth
                        <button class="btn btn-primary bold w-100" data-abonnement="ultra" data-toggle="modal"
                            data-target="#exampleModal">Demander</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>