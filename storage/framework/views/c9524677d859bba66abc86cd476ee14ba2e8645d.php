<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Primary Meta Tags -->
    <meta name="title" content="TendAxe  Appels d'offres et  consultations en Algérie">
    <meta name="description"
        content="TendAxe est une plateforme professionnelle des appels d'offres et des consultations sur le marché publique et privé pour des projets dans tous les secteurs (domaine) d'activité; en supplément d'information l'ensemble des adjudications et les ventes aux enchères sur le territoire national   الموقع الأكثر احترافية في الجزائر المختص في المناقصات و الاستشارات الخاصة و العمومية لمختلف المشاريع في جميع المجالات الاقتصادية  كما يوفر لكم الموقع كل العروض البيع في المزاد">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.tendaxe.com/">
    <meta property="og:title" content="TendAxe  Appels d'offres et  consultations en Algérie">
    <meta property="og:description"
        content="TendAxe est une plateforme professionnelle des appels d'offres et des consultations sur le marché publique et privé pour des projets dans tous les secteurs (domaine) d'activité; en supplément d'information l'ensemble des adjudications et les ventes aux enchères sur le territoire national   الموقع الأكثر احترافية في الجزائر المختص في المناقصات و الاستشارات الخاصة و العمومية لمختلف المشاريع في جميع المجالات الاقتصادية  كما يوفر لكم الموقع كل العروض البيع في المزاد">
    <meta property="og:image" content="<?php echo e(asset('img/meta.jpg')); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.tendaxe.com/">
    <meta property="twitter:title" content="TendAxe  Appels d'offres et  consultations en Algérie">
    <meta property="twitter:description"
        content="TendAxe est une plateforme professionnelle des appels d'offres et des consultations sur le marché publique et privé pour des projets dans tous les secteurs (domaine) d'activité; en supplément d'information l'ensemble des adjudications et les ventes aux enchères sur le territoire national   الموقع الأكثر احترافية في الجزائر المختص في المناقصات و الاستشارات الخاصة و العمومية لمختلف المشاريع في جميع المجالات الاقتصادية  كما يوفر لكم الموقع كل العروض البيع في المزاد">
    <meta property="twitter:image" content="<?php echo e(asset('img/meta.jpg')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>">

    <!-- selectpicker bootstrap CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- animate on scroll css-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- counting animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js"></script>
    <script src="<?php echo e(asset('vendor/counterup/jquery.counterup.min.js')); ?>"></script>


    <!-- animate on scroll js -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    
    <script src="<?php echo e(asset('vendor/dzayer/dzayer.js')); ?>"></script>

    <!-- selectpicker bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

    <link href="<?php echo e(asset('css/storestyle.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <title> <?php echo $__env->yieldContent('title'); ?> | TendAxe Appels d'offres et consultations en Algérie</title>
    <link rel="icon" href="<?php echo e(asset('img/icons/main.png')); ?>" type="image/icon type">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php echo $__env->yieldContent('styling'); ?>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-light bg-light px-4 py-md-3 shadow fixed-top">
        <a class="navbar-brand" href="/">
            <div class="h2 my-1">
                <b><span id="logo" class="">Tend</span><span class="text-primary">Axe</span></b>
            </div>
        </a>
        
        <div class="dropdown show-md">
            <a class="show-md" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img id="custom-toggle-icon" src="<?php echo e(asset('img/icons/navbar_button_dark.png')); ?>" alt="">
            </a>

            <div class="dropdown-menu dropdown-menu-right bg-light mx-0" style="max-width: none; margin-top: 29px;"
                id="custom_nav_drop" aria-labelledby="custom_nav_drop">
                <a class="dropdown-item pl-2 d-flex align-items-center" href="/">
                    <div style="width: 40px">
                        <img class="mr-2 p-1" src="<?php echo e(asset('img/icons/home.png')); ?>" alt="">
                    </div>
                    <span>
                        Acceuil
                    </span>
                </a>
                <a class="dropdown-item pl-2 d-flex align-items-center" href="<?php echo e(route('search')); ?>">
                    <div style="width: 40px">
                        <img class="img-fluid mr-2 p-1" src="<?php echo e(asset('img/icons/annouce2.png')); ?>" alt="">
                    </div>
                    <span>
                        Appel d’offre
                    </span>
                </a>



                <a class="dropdown-item pl-2 d-flex align-items-center" href="<?php echo e(route('help')); ?>">
                    <div style="width: 40px">
                        <img class="mr-2 p-1" src="<?php echo e(asset('img/icons/help2.png')); ?>" alt="">
                    </div>
                    <span>Aide</span>
                </a>
                <?php if(auth()->guard()->guest()): ?>
                    <a class="dropdown-item pl-2 d-flex align-items-center" href="<?php echo e(route('login')); ?>">
                        <div style="width: 40px">
                            <img class="mr-2 p-1" src="<?php echo e(asset('img/icons/login.png')); ?>" alt="">
                        </div>
                        <span>Connexion</span>
                    </a>
                    <a class="dropdown-item px-1 d-flex align-items-center" href="<?php echo e(route('register')); ?>">
                        <div class="btn btn-primary flex-fill">Inscription</div>
                    </a>
                <?php endif; ?>
                
                

                <?php if(auth()->guard()->check()): ?>
                    <a class="dropdown-item pl-2 d-flex align-items-center" href="<?php echo e(route('offre.favorit')); ?>">
                        <div style="width: 40px">
                            <img class="mr-2 p-1" width="32px" src="<?php echo e(asset('img/icons/star.png')); ?>"
                                alt="">
                        </div>
                        <span>Favories</span>
                    </a>
                    <a class="dropdown-item pl-2" href="#" id="sub_drop" role="button" data-toggle="dropdown"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo e(asset('img/icons/user.png')); ?>" width="30px" class="">
                        <img src="<?php echo e(asset('img/icons/dropdown.png')); ?>" width="25px">
                        <span class=""><?php echo e(Auth::user()->nom . ' ' . Auth::user()->prenom); ?></span>
                    </a>
                    <div class="dropdown mr-4">
                        <form action="<?php echo e(route('logout')); ?>" method="POST"
                            class="dropdown-menu dropdown-menu-right bg-light mt-2" aria-labelledby="sub_drop"
                            style="max-width: none;">
                            <?php echo csrf_field(); ?>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('profile')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/user3.png')); ?>"
                                    alt="">
                                Profile
                            </a>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('abonnement')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/doc2.png')); ?>"
                                    alt="">
                                Abonnement
                            </a>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('notification')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/notifbell.png')); ?>"
                                    alt="">
                                Notification
                            </a>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('user.offers')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/stacked_doc.png')); ?>"
                                    alt="">
                                Mes Offres
                            </a>
                            <button type="submit" class="dropdown-item pl-2 pr-5">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/out.png')); ?>"
                                    alt="">
                                se deconnecter
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item px-2">
                    <a class="nav-link" href="/">Acceuil</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="<?php echo e(route('search')); ?>">Appels d'offre</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="<?php echo e(route('store')); ?>">Store</a>
                </li>
                <?php if(Auth::check() && Auth::user()->type_user === 'abonné'): ?>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="<?php echo e(route('offre.favorit')); ?>">Favories</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item px-2">
                    <a class="nav-link" href="<?php echo e(route('help')); ?>">Aide</a>
                </li>
                <?php if(auth()->guard()->check()): ?>

                    <li class="nav-item px-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2"><?php echo e(Auth::user()->nom . ' ' . Auth::user()->prenom); ?></span>
                            <img src="<?php echo e(asset('img/icons/user.png')); ?>" class="img-fluid">
                            <img src="<?php echo e(asset('img/icons/dropdown.png')); ?>" width="25px">
                        </a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="dropdown-menu dropdown-menu-right"
                            style="max-width: none;" aria-labelledby="navbarDropdownMenuLink">
                            <?php echo csrf_field(); ?>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('profile')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/user3.png')); ?>"
                                    alt="">
                                Profile
                            </a>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('abonnement')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/doc2.png')); ?>"
                                    alt="">
                                Abonnement
                            </a>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('notification')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/notifbell.png')); ?>"
                                    alt="">
                                Notification
                            </a>
                            <a class="dropdown-item pl-2 pr-5" href="<?php echo e(route('user.offers')); ?>">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/stacked_doc.png')); ?>"
                                    alt="">
                                Mes Offres
                            </a>
                            <button type="submit" class="dropdown-item pl-2 pr-5">
                                <img class="mr-2" width="25px" src="<?php echo e(asset('img/icons/out.png')); ?>"
                                    alt="">
                                se deconnecter
                            </button>
                        </form>

                    </li>
                <?php endif; ?>

                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Connexion</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="btn btn-primary" href="<?php echo e(route('register')); ?>">Inscription</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <footer class="footer bg-dark mt-5 px-5 pt-5 pb-2">
        <div class="row">
            <div class="col-md-2">
                <div class="h2 text-md-left text-center">
                    <b><span class="text-white">Tend</span><span class="text-primary">Axe</span></b>
                </div>
            </div>
            <div class="col-md-4 tendaxe mt-md-3 mb-2">
                <p class="text-white">
                    TendAxe est <span class="">une</span> platforme <span class="">profissionnelle</span>
                    pour les appels d’offres et les <span class="">consultations</span> sur le marché publique et
                    privé
                </p>
                <div class="text-md-left text-center">
                    <a href="<?php echo e(route('help')); ?>">Aide</a>
                    <span class="text-primary"> | </span>
                    <a href="<?php echo e(route('docs')); ?>">Documents utiles</a>
                    <span class="text-primary"> | </span>
                    <a href="<?php echo e(route('conditions')); ?>">CGU</a>

                    
                </div>
            </div>
            <div class="offset-md-3 col-md-3 text-md-left text-center">
                <div class="my-3 d-flex">
                    <img src="<?php echo e(asset('img/icons/cell_phone.png')); ?>"> <span class="ml-3 text-white">07 78 33 00 81
                    </span>
                </div>
                <div class="my-3 d-flex">
                    <img src="<?php echo e(asset('img/icons/phone.png')); ?>"> <span class="ml-3 text-white">0 25 25 76 82</span>
                </div>
                <div class="my-3 d-flex">
                    <img src="<?php echo e(asset('img/icons/msg.png')); ?>" width="22px" height="17px"> <span
                        class="ml-3 text-white"> tendaxe@gmail.com </span>
                </div>
                <div class="my-3 d-flex">
                    <img src="<?php echo e(asset('img/icons/fb.png')); ?>"> <span class="ml-3 text-white"> tendaxe </span>
                </div>
                <div class="my-3 d-flex">
                    <img width="22px" height="27px" src="<?php echo e(asset('img/icons/indic.png')); ?>"> <span
                        class="ml-3 text-white"> LOT N 141 P 10 Rue Aouicha Amer BOUINAN- BLIDA </span>
                </div>
            </div>
        </div>
        <div class="text-center mt-3 text-white">
            © 2021 www.tendaxe.com - All rights reserved.
        </div>
    </footer>

    <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>

    <?php if(Auth::check() && (Auth::user()->type_user === 'admin' || Auth::user()->type_user === 'publisher')): ?>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez vous supprimer cet offre?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
                        <form method="POST"
                            action="<?php echo e(Auth::user()->type_user !== 'content' ? route('admin.offre.destroy') : route('rep.offre.destroy')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="number" name="offre" id="offre_id" hidden>
                            <button class="btn btn-primary">Oui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $('#exampleModalCenter').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id')

                $('#offre_id').val(id);
            });
        </script>
    <?php endif; ?>
    <script>
        $(document).on('click', '.show-md .dropdown-menu', function(e) {
            e.stopPropagation();
        });
    </script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".mySwiper", {
		  slidesPerView: 5,
		  grid: {
			rows: 1,
		  },
		  navigation: {
        nextEl: ".swiper-button-next1",
        prevEl: ".swiper-button-prev1",
      },
	  loop:true,
		  spaceBetween: 30,
		
		});
	  </script>
</body>
<?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/layouts/layout.blade.php ENDPATH**/ ?>