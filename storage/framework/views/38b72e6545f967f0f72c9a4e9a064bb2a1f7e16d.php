

<?php $__env->startSection('title', 'Acceuil'); ?>

<?php $__env->startSection('styling'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/home-edit.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <script>
            alert("<?php echo e(session('success')); ?>");
        </script>
    <?php endif; ?>
    <!-- start header -->

    <header>
        <div class="container mx-auto">
            <div class="text-white header-content">
                <div id="wlc" class="text-center">Trouvez vos projets préférés,Simplifiez vos Achats B2B</div>
                <div class="text-center wlc-phrase">
                    TendAxe- Votre Plateforme de Référence pour les Achats Professionnels B2B ,et lesmarchés publics
                    incluant les appels d'offres, les consultations et les ventes aux enchères
                </div>
                <div class="btns">

                    <a href="<?php echo e(route('search')); ?>" class="d-flex align-items-center text-center">
                        <div class="bg-white d-flex align-items-center justify-content-center">
                            APPELS <br> D'OFFRE
                        </div>
                        <div class="bg-primary p-2 d-flex align-items-center">
                            <i class="bi bi-files text-white"></i>
                        </div>
                    </a>
                    <?php if(Auth::user() && Auth::user()->store): ?>
                        <a href="<?php echo e(route('storePanel')); ?>" class="d-flex align-items-center text-center" style="margin-right: 30px;">
                            <div class="bg-white d-flex align-items-center justify-content-center">
                                Ma Boutique
                            </div>
                            <div class="bg-primary p-2 d-flex align-items-center">
                                <i class="bi bi-files text-white"></i>
                            </div>
                        </a>
                    <?php endif; ?>
                    
                    <a href="<?php echo e(route('store')); ?>" class="d-flex align-items-center text-center">
                        <div class="bg-white d-flex align-items-center justify-content-center">
                            TENDAXE <br> STORE
                        </div>
                        <div class="bg-primary p-2 d-flex align-items-center">
                            <i class="bi bi-shop text-white"></i>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </header>

    <!-- end header -->



    <!-- start section: tendaxe-features -->

    <section class="tendaxe-features my-5">
        <div class="container">
            <div class="row mx-0">
                <div class="col-md-4 px-md-0">
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            
                            <svg width="30" height="40" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_4155_2797)">
                                    <path
                                        d="M12.7371 10.075C13.1545 10.075 13.5721 9.91569 13.8905 9.59715C14.5276 8.96018 14.5276 7.92724 13.8906 7.29016L10.4304 3.82974C9.79335 3.19277 8.76052 3.19266 8.12333 3.82963C7.48625 4.4667 7.48625 5.49954 8.12322 6.13672L11.5835 9.59715C11.9022 9.9158 12.3196 10.075 12.7371 10.075Z"
                                        fill="#11A3AB" />
                                    <path
                                        d="M27.7324 10.0747C28.1497 10.0747 28.5674 9.91537 28.8859 9.59694L32.3464 6.1364C32.9835 5.49943 32.9835 4.46649 32.3465 3.82941C31.7096 3.19244 30.6766 3.19244 30.0394 3.82941L26.5789 7.28973C25.9418 7.92681 25.9418 8.95964 26.5788 9.59683C26.8974 9.91537 27.3147 10.0747 27.7324 10.0747Z"
                                        fill="#11A3AB" />
                                    <path
                                        d="M14.9885 0.124611C14.1561 0.46936 13.7609 1.42367 14.1056 2.25607L15.9748 6.76869C16.2351 7.39685 16.8424 7.77618 17.4826 7.77618C17.6905 7.77618 17.902 7.73616 18.1061 7.65155C18.9385 7.3068 19.3338 6.35249 18.989 5.52009L17.1199 1.00747C16.775 0.175182 15.8209 -0.220137 14.9885 0.124611Z"
                                        fill="#11A3AB" />
                                    <path
                                        d="M25.4813 0.124611C24.6491 -0.220137 23.6947 0.174964 23.3499 1.00736L21.4804 5.51998C21.1356 6.35238 21.5308 7.30669 22.3632 7.65155C22.5673 7.73605 22.7787 7.77618 22.9868 7.77618C23.6269 7.77618 24.2343 7.39696 24.4944 6.7688L26.3638 2.25618C26.7089 1.42367 26.3137 0.469469 25.4813 0.124611Z"
                                        fill="#11A3AB" />
                                    <path
                                        d="M33.2863 21.9282L25.1289 21.9237V15.9414C25.129 13.2429 22.9336 11.0476 20.2351 11.0476C19.6632 11.0476 19.1143 11.1471 18.6038 11.3281V33.3421C18.6037 34.2429 17.8733 34.9733 16.9724 34.9734C16.0716 34.9734 15.3411 34.2429 15.3412 33.342L15.3411 22.2006C14.8241 22.0181 14.2743 21.923 13.7098 21.9228C11.0113 21.923 8.81598 24.1181 8.81587 26.8169V33.3183C8.81587 41.4139 15.402 48 23.4977 48H36.5898L37.0598 45.6472C37.0597 45.6478 37.0598 45.6468 37.0598 45.6472L40.3201 29.3308C40.3208 29.3272 40.3217 29.3235 40.3223 29.3196L40.3229 29.3166C40.3256 29.3033 40.3263 29.2901 40.3288 29.2768C40.3356 29.2379 40.3424 29.1993 40.3462 29.1597C40.3518 29.1046 40.3548 29.0497 40.3548 28.9953C40.3547 28.9888 40.3541 28.9823 40.354 28.9758C40.3423 25.0881 37.1763 21.9285 33.2863 21.9282Z"
                                        fill="#11A3AB" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_4155_2797">
                                        <rect width="48" height="48" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <span class="ml-3 font-weight-700">Simplifiez vos achats</span>

                        </div>
                        <div class="mt-2">
                            <small class="font-weight-500">
                                Achetez en toute confiance sur notre plateforme conviviale. Simplifiez vos processus d'achat
                                grâce à des fonctionnalités intuitives telles que la recherche avancée, le suivi des
                                commandes
                                et le paiement sécurisé
                            </small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            
                            <svg width="30" height="40" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M34.5 2.25H13.5C9.3675 2.25 6 5.6175 6 9.75V38.25C6 42.3825 9.3675 45.75 13.5 45.75H34.5C38.6325 45.75 42 42.3825 42 38.25V9.75C42 5.6175 38.6325 2.25 34.5 2.25ZM15 9.75H33C33.825 9.75 34.5 10.425 34.5 11.25C34.5 12.075 33.825 12.75 33 12.75H15C14.175 12.75 13.5 12.075 13.5 11.25C13.5 10.425 14.175 9.75 15 9.75ZM15 17.25H24C24.825 17.25 25.5 17.925 25.5 18.75C25.5 19.575 24.825 20.25 24 20.25H15C14.175 20.25 13.5 19.575 13.5 18.75C13.5 17.925 14.175 17.25 15 17.25ZM34.2225 37.17C32.0475 37.8825 30.2925 38.2425 28.92 38.2425C27.45 38.2425 26.415 37.83 25.755 37.005C25.395 36.555 25.215 36.06 25.155 35.5575L21.315 37.1325C20.6475 37.4025 19.875 37.1625 19.485 36.5475C19.095 35.9325 19.2 35.13 19.7325 34.6425C20.775 33.6825 22.4175 30.315 22.26 29.25H22.1925C20.595 29.25 17.49 33.3 15.5925 37.08C15.2175 37.8225 14.3175 38.115 13.575 37.7475C12.84 37.38 12.54 36.48 12.9075 35.7375C13.7025 34.155 17.8725 26.25 22.1925 26.25C23.55 26.25 24.5775 26.895 25.02 28.0275C25.515 29.2875 25.1325 31.005 24.4575 32.6025L26.6775 31.6875C27.2775 31.4475 27.9675 31.6125 28.3875 32.1C28.8075 32.595 28.8675 33.3 28.5375 33.855C28.29 34.2675 28.095 34.8825 28.125 35.1375C28.335 35.235 29.46 35.5725 33.2775 34.32C34.0725 34.0575 34.9125 34.485 35.175 35.2725C35.4375 36.06 35.0025 36.9075 34.2225 37.17Z"
                                    fill="#11A3AB" />
                            </svg>

                            <span class="ml-3 font-weight-700">demande de devis</span>
                        </div>
                        <div class="mt-2">
                            <small class="font-weight-500">
                                Publiez vos demandes achats, appels d'offres et sous-traitance sur notre plateforme et
                                recevez
                                des offres de fournisseurs qualifiés
                            </small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            
                            <svg width="30" height="40" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M26.8426 2.73226L29.7007 4.87163C30.4824 5.45673 31.3051 5.75616 32.28 5.81045L35.8445 6.00873C37.9789 6.12741 39.7124 7.58194 40.1999 9.66338L41.0143 13.1394C41.2369 14.09 41.6747 14.8482 42.3867 15.5164L44.9898 17.9596C46.5485 19.4225 46.9414 21.651 45.9771 23.5588L44.3666 26.7449C43.9261 27.6163 43.7741 28.4785 43.8899 29.448L44.3137 32.9929C44.5674 35.1155 43.4359 37.0751 41.4709 37.9167L38.1891 39.3222C37.2915 39.7066 36.6208 40.2694 36.0865 41.0865L34.1324 44.0743C32.9624 45.8633 30.836 46.6373 28.7898 46.0189L25.3724 44.9861C24.4378 44.7037 23.5623 44.7037 22.6276 44.9861L19.2103 46.0189C17.1641 46.6373 15.0376 45.8633 13.8676 44.0743L11.9136 41.0865C11.3791 40.2694 10.7084 39.7066 9.81097 39.3222L6.52897 37.9165C4.56397 37.0749 3.4325 35.1153 3.68619 32.9927L4.10994 29.4478C4.22582 28.4783 4.07375 27.6161 3.63332 26.7447L2.02279 23.5586C1.05847 21.6509 1.45138 19.4224 3.01007 17.9594L5.61322 15.5162C6.32516 14.848 6.76288 14.0898 6.98554 13.1392L7.79985 9.66319C8.28735 7.58185 10.0209 6.12732 12.1553 6.00854L15.7198 5.81026C16.6947 5.75607 17.5174 5.45654 18.2991 4.87145L21.1572 2.73207C22.8684 1.45126 25.1313 1.45126 26.8426 2.73226ZM22.1767 25.2247L19.0751 22.123C18.2712 21.3191 16.9672 21.3191 16.1634 22.123C15.3595 22.9269 15.3595 24.2308 16.1634 25.0347L20.7253 29.5966C21.5293 30.4004 22.8332 30.4005 23.637 29.5966C26.3867 26.8468 29.1053 24.0662 31.8423 21.3039C32.6404 20.4984 32.6379 19.1986 31.8334 18.3986C31.0289 17.5985 29.7253 17.6007 28.9264 18.4076L22.1767 25.2247ZM23.9998 8.66785C19.766 8.66785 15.9328 10.384 13.1582 13.1587C10.3836 15.9334 8.66741 19.7664 8.66741 24.0003C8.66741 28.2341 10.3836 32.0673 13.1582 34.8419C15.9328 37.6165 19.766 39.3327 23.9998 39.3327C28.2337 39.3327 32.0668 37.6165 34.8415 34.8419C37.6161 32.0673 39.3323 28.2341 39.3323 24.0003C39.3323 19.7664 37.6161 15.9333 34.8415 13.1587C32.0668 10.384 28.2337 8.66785 23.9998 8.66785ZM33.7809 14.2193C31.2778 11.7161 27.8196 10.1679 23.9998 10.1679C20.1801 10.1679 16.7219 11.7161 14.2188 14.2193C11.7157 16.7224 10.1674 20.1805 10.1674 24.0003C10.1674 27.82 11.7157 31.2782 14.2188 33.7813C16.7219 36.2844 20.1801 37.8327 23.9998 37.8327C27.8196 37.8327 31.2778 36.2844 33.7809 33.7814C36.284 31.2783 37.8322 27.8201 37.8322 24.0004C37.8323 20.1805 36.284 16.7224 33.7809 14.2193Z"
                                    fill="#11A3AB" />
                            </svg>

                            <span class="ml-3 font-weight-700">Garantie de qualité</span>
                        </div>
                        <div class="mt-2">
                            <small class="font-weight-500">
                                Achetez en toute tranquillité d'esprit avec notre engagement envers la qualité. Nous
                                travaillons
                                avec des fournisseurs professionnels et veillons à ce que chaque produit réponde à des
                                normes
                                élevées.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center my-2">
                    <img class="img-fluid" src="<?php echo e(asset('img/tendaxe-features.png')); ?>">
                </div>
                <div class="col-md-4 px-md-0">
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            
                            <svg width="30" height="40" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32.1634 7.09081C31.3548 6.50019 30.2727 6.34261 29.3379 6.70497L17.4769 11.7514C15.7086 12.5033 13.8402 12.8846 11.9231 12.8846H6.65491C4.63909 12.8846 3 14.5237 3 16.538V26.4485C3 28.4643 4.63909 30.1034 6.65491 30.1034H7.31106L11.914 40.5608C12.1707 41.1426 12.7404 41.4889 13.3389 41.4889C13.547 41.4889 13.7597 41.4464 13.9647 41.3568C14.7501 41.0104 15.1071 40.0929 14.7607 39.306L10.7101 30.1034H11.9231C13.8432 30.1034 15.7117 30.4847 17.4769 31.2351L29.4746 36.3316C30.3814 36.6244 31.3904 36.4608 32.1649 35.8957C32.9366 35.3306 33.3984 34.4237 33.3984 33.4667V9.52135C33.3984 8.56433 32.9366 7.65591 32.1634 7.09081Z"
                                    fill="#11A3AB" />
                                <path
                                    d="M38.4554 23.0488H43.4441C44.3039 23.0488 44.9996 22.353 44.9996 21.4932C44.9996 20.6334 44.3039 19.9377 43.4441 19.9377H38.4554C37.5956 19.9377 36.8999 20.6334 36.8999 21.4932C36.8999 22.353 37.5956 23.0488 38.4554 23.0488Z"
                                    fill="#11A3AB" />
                                <path
                                    d="M38.4569 16.4818C38.6909 16.4818 38.9294 16.4286 39.1542 16.3162L44.1428 13.8097C44.91 13.4239 45.2199 12.4896 44.834 11.721C44.4482 10.9538 43.52 10.6439 42.7453 11.0298L37.7566 13.5363C36.9895 13.9221 36.6796 14.8564 37.0654 15.625C37.3389 16.1689 37.8873 16.4818 38.4569 16.4818Z"
                                    fill="#11A3AB" />
                                <path
                                    d="M44.1428 29.1768L39.1542 26.6718C38.381 26.2859 37.4513 26.5989 37.0654 27.363C36.6796 28.1316 36.9895 29.0659 37.7566 29.4517L42.7453 31.9567C42.9701 32.0691 43.2086 32.1223 43.4425 32.1223C44.0122 32.1223 44.5606 31.8078 44.834 31.2655C45.2199 30.4968 44.91 29.5626 44.1428 29.1768Z"
                                    fill="#11A3AB" />
                            </svg>

                            <span class="ml-3 font-weight-700">Soyez informés des marchés publics</span>
                        </div>
                        <div class="mt-2">
                            <small class="font-weight-500">
                                Nous publions quotidiennement tous les appels d'offres, consultations, ventes aux enchères
                                et
                                attributions disponibles sur le marché public
                            </small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            
                            <svg width="30" height="40" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M24.6181 4.01057C20.7581 3.88103 16.8582 4.94226 13.4913 7.20705C9.70973 9.7534 7.06698 13.5136 5.84972 17.7172C5.51356 17.6759 5.11103 17.6941 4.63305 17.8304C2.84849 18.3406 1.5063 19.8142 0.902793 21.112C0.120048 22.8033 -0.210069 25.0401 0.138153 27.3492C0.483961 29.6511 1.44896 31.5486 2.65597 32.7266C3.8666 33.9052 5.23354 34.2883 6.59142 34.0007C8.61316 33.5658 9.61558 33.2405 9.33254 31.3424L7.96198 22.1416C8.23838 17.162 10.7966 12.4743 15.0755 9.59163C20.8027 5.73652 28.3115 5.98343 33.7745 10.2095C37.5747 13.1457 39.7811 17.5451 40.0358 22.1635L39.0774 28.5996C36.9398 34.4945 31.6405 38.5777 25.5083 39.1572H21.4249C20.3712 39.1572 19.5227 40.0123 19.5227 41.0729V42.0837C19.5227 43.1449 20.3712 44 21.4249 44H26.5734C27.6266 44 28.4715 43.1449 28.4715 42.0837V41.5552C33.0955 40.418 37.1317 37.5541 39.76 33.5604L41.4094 34.0013C42.7516 34.3522 44.1348 33.9052 45.3448 32.7272C46.5518 31.5486 47.5162 29.6517 47.8626 27.3499C48.2121 25.0407 47.8723 22.8075 47.0986 21.1126C46.3219 19.4176 45.165 18.3412 43.8294 17.955C43.27 17.7926 42.6629 17.733 42.142 17.7172C41.0412 13.9162 38.7751 10.4595 35.5089 7.93562C32.2977 5.45251 28.4781 4.13828 24.6181 4.01057Z"
                                    fill="#11A3AB" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M30.6441 20.5634C32.005 20.5634 33.1082 21.6751 33.1112 23.0502C33.1082 24.4216 32.005 25.5363 30.6441 25.5363C29.2796 25.5363 28.1733 24.4216 28.1733 23.0502C28.1733 21.6757 29.2802 20.5634 30.6441 20.5634ZM23.9995 20.5634C25.3634 20.5634 26.4666 21.6751 26.4666 23.0502C26.4666 24.4216 25.3634 25.5363 23.9995 25.5363C22.6344 25.5363 21.5312 24.4216 21.5312 23.0502C21.5312 21.6757 22.6344 20.5634 23.9995 20.5634ZM17.3573 20.5634C18.7182 20.5634 19.8245 21.6751 19.8245 23.0502C19.8245 24.4216 18.7182 25.5363 17.3573 25.5363C15.9934 25.5363 14.8896 24.4216 14.8896 23.0502C14.8896 21.6757 15.9934 20.5634 17.3573 20.5634ZM23.9995 9.88294C16.7635 9.88294 10.9324 15.5656 10.9324 23.0502C10.9324 26.645 12.2813 29.822 14.4786 32.1531L13.6989 35.6755C13.4418 36.8347 14.2396 37.6143 15.2734 37.0342L18.6868 35.1154C20.3091 35.8251 22.1033 36.2174 23.9995 36.2174C31.2379 36.2174 37.0654 30.5384 37.0654 23.0502C37.0654 15.5656 31.2379 9.88294 23.9995 9.88294Z"
                                    fill="#11A3AB" />
                            </svg>


                            <span class="ml-3 font-weight-700">service clientèle dédié</span>
                        </div>
                        <div class="mt-2">
                            <small class="font-weight-500">
                                Notre équipe de service clientèle est disponible pour répondre à vos questions, vous
                                assister
                                dans vos achats et résoudre tout problème éventuel de manière rapide et efficace.
                            </small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            
                            <svg width="30" height="40" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32.7188 1.35807C32.7188 1.35807 16.9137 -2.52848 12.713 9.01189C10.0177 16.417 7.47664 23.3959 4.71301 30.9944C3.16682 35.2417 4.6781 39.073 8.80028 40.5726C12.921 42.0737 17.3166 43.6737 17.3166 43.6737C17.3166 43.6737 21.7123 45.2737 25.8345 46.7733C29.9566 48.273 33.577 46.3108 35.1217 42.0635C37.8883 34.4635 40.4279 27.4875 43.1232 20.0824C47.3239 8.53916 32.7188 1.35807 32.7188 1.35807ZM31.241 5.41625C32.7697 5.97334 33.5581 7.66498 33.0025 9.1937C32.4454 10.7239 30.7537 11.5122 29.225 10.9552C27.6948 10.3981 26.9079 8.70789 27.4636 7.1777C28.0206 5.64752 29.7108 4.86061 31.241 5.41625ZM21.8417 36.1959L20.777 39.1224L17.3166 37.8643L18.2883 35.1952C16.2054 34.3079 14.3406 33.0104 13.3661 32.0068L15.8097 28.4097C16.9443 29.537 18.5981 30.8548 20.6912 31.617C22.2083 32.1683 23.4476 32.1639 23.7821 31.2475C24.1065 30.3559 23.4243 29.489 21.3879 28.0039C18.4454 25.793 16.6403 23.4788 17.6948 20.5799C18.6461 17.9675 21.3108 16.6002 24.9806 17.1864L25.9421 14.545L29.401 15.8032L28.5225 18.2119C30.5865 19.0628 31.865 19.985 32.8017 20.8112L30.4439 24.2759C29.7385 23.6635 28.5225 22.4708 26.2156 21.633C24.4236 20.9813 23.6585 21.3842 23.4286 22.017C23.1668 22.7326 24.0003 23.6562 26.2359 25.4453C29.6323 28.0126 30.4337 30.1552 29.4825 32.7675C28.5108 35.4366 25.7137 36.8883 21.8417 36.1959Z"
                                    fill="#11A3AB" />
                            </svg>

                            <span class="ml-3 font-weight-700">milleurs prix</span>
                        </div>
                        <div class="mt-2">
                            <small class="font-weight-500">
                                Tendaxe se distingue par ses prix concurrentiels sur une gamme variée d'articles qu'il
                                propose
                                grâce à des partenariats et des conventions avec ses partenaires à travers le monde.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section: tendaxe-features -->


    <!-- start section: tendaxe-store-about -->

    <section class="tendaxe-store-about">
        <div class="container">
            <div class="d-flex flex-column align-items-center">
                <img src="<?php echo e(asset('img/logo4.png')); ?>" alt="STORE">
                <div class="my-5 tendax-store-section">
                    <img src="<?php echo e(asset('img/STORE.png')); ?>" alt="" class="store-section-img">
                    <div class="container my-4">
                        <p class="text-justify tendaxe-store-about-desc">
                            TendAxe Store est une plateforme centralisée et référentielle pour les entreprises, rassemblant
                            une
                            multitude de fabricants, importateurs, prestataires et des grands fournisseurs afin de répondre
                            aux
                            besoins d'achats diversifiés des différents organismes.
                        </p>
                        <div class="my-4">
                            <p>
                                <img src="<?php echo e(asset('img/icons/start.png')); ?>" alt="image" class="mr-2"> Soyez guidés
                                par
                                nos experts
                            </p>
                            <p>
                                <img src="<?php echo e(asset('img/icons/annaux.png')); ?>" alt="image" class="mr-2"> Pour
                                toutes
                                les
                                organismes
                            </p>
                            <p>
                                <img src="<?php echo e(asset('img/icons/24.png')); ?>" alt="image" class="mr-2">
                                Devis en 24 heurs
                            </p>
                            <p>
                                <img src="<?php echo e(asset('img/icons/card.png')); ?>" alt="image" class="mr-2"> Commandez
                                vos
                                articles
                            </p>

                        </div>

                        <p class="my-4">
                            <b>
                                Tous les achats de votre organisation, quel que soit votre secteur d'activité.
                            </b>
                        </p>
                        <div class="text-center">
                            <a href="<?php echo e(route('store')); ?>" class="btn btn-lg btn-primary">
                                Accéder à TendAxe Store <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- start section : articles-categories -->

    <section class="">
        <div class='container'>
            <h2 class=" section-title"><span>catégories d'articles</span></h2>
            <div class="swiper categoriesSwiper px-4">
                <div class="swiper-wrapper mx-auto">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <a href="<?php echo e(route('category.products', $item->id)); ?>">
                                <div class="box-catego">
                                    <img src="<?php echo e(asset($item->picture ? 'pictures/Category/' . $item->picture : 'pictures/Category/default.webp')); ?>"
                                        alt="category">
                                    <h6 class="catego-name">
                                        <?php echo e($item->name); ?>

                                    </h6>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="d-flex justify-content-end ">
                    <a href="<?php echo e(route('store')); ?>">
                        <button class="btn btn-primary ">Voir Tous</button>
                    </a>
                </div>
                <div class="categories-swiper-button-next1 swiper-button-next">
                    <img src="<?php echo e(asset('img/right.png')); ?>" alt="">
                </div>
                <div class="swiper-button-prev categories-swiper-button-prev1">
                    <img src="<?php echo e(asset('img/left.png')); ?>" alt="">
                </div>

            </div>
    </section>

    <!-- end section : articles-categories -->


    <!-- start section : demmande-facture-proforma -->

    <section class="demmande-facture-proforma">
        <div class="container">
            <h2 class="demmande-facture-proforma-title section-title"><span>Besoin d'un devis ?</span></h2>
            <div>
                <h5>Fait-nous part de vous besoin</h5>
                <p>
                    Tendaxe est la pour vous accompagne à trouver les articles que vouschercher gratuitement alors n’hésiter
                    pas
                    à nous contacter.
                </p>
                <h5 class="comment">Comment ça marche ?</h5>
                <ol class="comment">
                    <li>
                        Veuiller remplir le formulaire si dessous
                    </li>
                    <li>
                        Précisez les articles recherchés (désignation d'équipements, matériels,matières, outils ou autres)
                        avec
                        la quantité et le délai ; vous pouvez ajouterune photo ou un fichier de liste d'articles (liste de
                        produits demandé ou unbordereau de prix à remplir).
                    </li>
                    <li>
                        Des experts dédiés recherchent gratuitement les produit rependant àvotre besoin (demande de devis,
                        bon
                        de disponibilité, détails techniques )
                    </li>
                    <li>
                        vous recevez des réponse dans les 24 heur ouvré (devis,facteur-proforma, fiches techniques…)
                    </li>
                </ol>
            </div>

            <div class="row py-4 flex-row flex-md-column-reverse flex-lg-row">
                <div class="col-12 col-md-12 col-lg-8">
                    <form class="bg-white border px-4 pt-3 rounded" method="POST"
                        action="<?php echo e(route('facteurProformastore')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nomination de Organisme (raison social)</label>
                                    <input class="form-control bg-light" type="text" name="raison" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input class="form-control bg-light" type="text" name="nom" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input class="form-control bg-light" type="text" name="prenom" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input class="form-control bg-light" type="email" name="email" required
                                    value="">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control bg-light" type="text" name="phone" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Paye</label>
                                    <input class="form-control bg-light" type="paye" name="paye" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Region</label>
                                    <input class="form-control bg-light" type="region" name="region" required>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">

                                    <label>Votre besoin</label> <br>

                                    <textarea class="form-control bg-light" name="besoin" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Insérer votre liste d'articles (photo, pdf ou excel)</label>
                                    <div class="upload-document-wrapper">
                                        <div id="dropzone">
                                            <input type="file" id="fileInput" multiple="" name="files"
                                                style="display: none;">
                                            <svg width="49" height="48" viewBox="0 0 49 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.36529 42H31.4552C32.3708 42 33.1132 41.2697 33.1132 40.3672C33.1132 39.4648 32.3708 38.7345 31.4552 38.7345H6.36529C5.51117 38.7345 4.81655 38.0504 4.81655 37.2085V14.3802C4.81655 13.5383 5.51117 12.8542 6.36529 12.8542H13.5795C15.7225 12.8542 17.642 11.4383 18.2508 9.40055L18.5528 8.36732C18.7463 7.71836 19.3583 7.26553 20.0408 7.26553H27.9602C28.6427 7.26553 29.2539 7.71836 29.445 8.35935L29.7526 9.41012C30.1956 10.8921 31.3432 12.0399 32.7634 12.5547V14.8218C32.7634 17.4623 34.9453 19.6117 37.6274 19.6117H43.1844V27.184C43.1844 28.0864 43.9268 28.8167 44.8425 28.8167C45.7581 28.8167 46.5005 28.0864 46.5005 27.184V14.3802C46.5005 11.7381 44.3178 9.5887 41.6357 9.5887H34.4215C33.739 9.5887 33.1278 9.13587 32.9367 8.49648L32.6291 7.4457C32.0235 5.41751 30.1031 4 27.9602 4H20.0408C17.897 4 15.9767 5.41751 15.3687 7.45527L15.0667 8.4885C14.8732 9.13587 14.262 9.5887 13.5795 9.5887H6.36529C3.68313 9.5887 1.50049 11.7381 1.50049 14.3802V37.2085C1.50049 39.8506 3.68313 42 6.36529 42ZM41.6357 12.8542C42.4898 12.8542 43.1844 13.5383 43.1844 14.3802V16.3462H37.6274C36.7741 16.3462 36.0795 15.6621 36.0795 14.8218V12.8542H41.6357Z"
                                                    fill="#11A3AB" />
                                                <path
                                                    d="M24.0009 16C18.7625 16 14.5005 20.4857 14.5005 26.0008C14.5005 31.5143 18.7625 36 24.0009 36C29.2392 36 33.5005 31.5143 33.5005 26.0008C33.5005 20.4857 29.2392 16 24.0009 16ZM24.0009 32.5721C20.5577 32.5721 17.7569 29.6246 17.7569 26.0008C17.7569 22.3771 20.5577 19.4279 24.0009 19.4279C27.4433 19.4279 30.2441 22.3771 30.2441 26.0008C30.2441 29.6246 27.4433 32.5721 24.0009 32.5721Z"
                                                    fill="#11A3AB" />
                                                <path
                                                    d="M45.9188 35.7857H43.0822V32.7135C43.0822 31.7664 42.374 31 41.5005 31C40.627 31 39.9188 31.7664 39.9188 32.7135V35.7857H37.0822C36.2087 35.7857 35.5005 36.5521 35.5005 37.4992C35.5005 38.4463 36.2087 39.2126 37.0822 39.2126H39.9188V42.2865C39.9188 43.2336 40.627 44 41.5005 44C42.374 44 43.0822 43.2336 43.0822 42.2865V39.2126H45.9188C46.7923 39.2126 47.5005 38.4463 47.5005 37.4992C47.5005 36.5521 46.7923 35.7857 45.9188 35.7857Z"
                                                    fill="#11A3AB" />
                                            </svg>
                                            <p>Déposez vos fichiers ici ou cliquez pour les sélectionner</p>
                                        </div>
                                        <div id="fileInfos">
                                            <h4>fichier(s) importé(s) :</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-100 text-right">
                                <button class="btn btn-primary">Demander facture proforma</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="d-none d-md-flex col-md-12 col-lg-4">
                <img src="<?php echo e(asset('img/facture.png')); ?>" alt="pFACTURE" class="facture-img">
            </div>
        </div>
        </div>
    </section>
    <!-- end section : demmande-facture-proforma -->



    <!-- start section : last-advertisements -->

    <section id="latest" class="last-advertisements my-5">
        <div class="container">
            <div>
                <h2 class="last-advertisements-title section-title"><span>Appels d'offres</span></h2>
                <?php $__currentLoopData = App\Models\Offre::where('etat', 'active')->latest()->take(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.offre','data' => ['exp' => false,'offre' => $item]]); ?>
<?php $component->withName('offre'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['exp' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'offre' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <div class="text-right">
                <a href="<?php echo e(route('search')); ?>" class="btn btn-primary font-weight-600">Tous les appels
                    d’offre <img class="pl-4" src="<?php echo e(asset('img/icons/arrow.png')); ?>"></a>
            </div>
        </div>

    </section>

    <!-- end section : last-advertisements -->



    <!-- start section : stats -->

    <section id="servies" class="stats my-5">
        <div class="container">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                <div class="col text-center px-4 my-2">
                    <div class="bg-white stat-box p-3 border h-100">
                        <img class="img-fluid mx-auto my-3" src="<?php echo e(asset('img/stat-products-icon.png')); ?>">
                        <div class="h4 bold">+<span class="counter">50000</span></div>
                        <small class="bold">produits Répartis dans 14 univers du bricolage</small>
                    </div>
                </div>
                <div class="col text-center px-4 my-2">
                    <div class="bg-white stat-box p-3 border h-100">
                        <img class="img-fluid mx-auto my-3" src="<?php echo e(asset('img/stat-products-icon.png')); ?>">
                        <div class="h4 bold">+<span class="counter">600</span></div>
                        <small class="bold">marques Sélectionnées avec soin et toujours au meilleur prix</small>
                    </div>
                </div>
                <div class="col text-center px-4 my-2">
                    <div class="bg-white stat-box p-3 border h-100">
                        <img class="img-fluid mx-auto my-3" src="<?php echo e(asset('img/icons/building.png')); ?>">
                        <div class="h4 bold">+<span class="counter">15000</span></div>
                        <small class="bold">
                            Entreprises sur l’annuaire
                            (disponible bientôt)
                        </small>
                    </div>
                </div>
                <div class="col text-center px-4 my-2 ">
                    <div class="bg-white stat-box p-3 border h-100">
                        <img class="img-fluid mx-auto my-3" src="<?php echo e(asset('img/icons/annouce.png')); ?>">
                        <div class="h4 bold">+<span class="counter">170</span></div>
                        <small class="bold">sources d’annonces</small>
                    </div>
                </div>
                <div class="col text-center px-4 my-2">
                    <div class="bg-white stat-box p-3 border h-100">
                        <img class="img-fluid mx-auto my-3" src="<?php echo e(asset('img/icons/doc.png')); ?>">
                        <div class="h4 bold">+<span class="counter">1900</span></div>
                        <small class="bold">Publications / Semaine</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section : stats -->


    <!-- start section : popular-products -->

    <section class="popular-products">
        <div class="container">
            <h2 class="popular-products-title section-title"><span>Produits fréquents</span></h2>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card product-box">
                            <?php if($product->discount > 0): ?>
                                <span class="discount"> - <?php echo e($product->discount); ?> %</span>
                            <?php endif; ?>
                            <a href="<?php echo e(route('store.product.details', $product->id)); ?>">
                                <img class="mx-auto py-2" src="<?php echo e(asset('pictures/Products/' . $product->picture)); ?>"
                                    alt="Card image cap">
                            </a>
                            <div class="p-2 desc">
                                <a href="<?php echo e(route('store.product.details', $product->id)); ?>">
                                    <p class="product-name"><?php echo e($product->name); ?></p>
                                </a>
                                <p class="marque">
                                    <span>Marque : </span>
                                    <a href="" class="marque-link"><?php echo e($product->brand->name ?? ''); ?></a>
                                </p>

                                <p class="price">
                                    <span class="new-price">
                                        <?php echo $product->price
                                            ? $product->price . ' DA'
                                            : "<span class='marque'><span class='marque-link'>Prix : non mentionné </span> </span>"; ?>

                                    </span>
                                    <?php if($product->price && $product->discount > 0): ?>
                                        <span class="old-price">
                                            <?php echo e($product->price - ($product->price * $product->discount) / 100); ?>

                                        </span>
                                    <?php endif; ?>

                                </p>
                                <form id="add-to-cart-form-<?php echo e($product->id); ?>" method="post"
                                    action="<?php echo e(route('cart.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <div class="qte-products">
                                        <span>Qte :</span>
                                        <div class="qte-products-control">
                                            <button type="button" class="text-center"
                                                onclick="changeQty(this, -1)">-</button>
                                            <input class="text-center" id="qty-<?php echo e($product->id); ?>" min="1"
                                                value="1" type="number" name="qte">
                                            <button type="button" class="text-center"
                                                onclick="changeQty(this, 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i> Ajouter
                                            au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <a href="<?php echo e(route('allproducts')); ?>" class="view-more">
                <span>voir plus</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- end section : popular-products -->


    <!-- start section : stores -->

    <section class="stores">
        <div class='container'>
            <h2 class="stores-title section-title"><span>Boutiques</span></h2>
            <div class="swiper storesSwiper px-4">
                <div class="swiper-wrapper m-4 mx-auto">
                    <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <a class="boutique-card" href="<?php echo e(route('store.show', $item->id)); ?>">
                                <div class="store-cover">
                                    <img src="<?php echo e(asset('pictures/storeCovera/' . $item->cover)); ?>"
                                        class="store-cover-img" alt="couverture de boutique">
                                </div>
                                <div class="store-profil">
                                    <img src="<?php echo e(asset('pictures/storeLogos/' . $item->logo)); ?>" class="store-profil-img"
                                        alt="profile de boutique">
                                </div>

                                <h5 class="store-name"><?php echo e($item->storeName); ?></h5>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <div class="d-flex justify-content-md-end justify-content-center mt-md-4 mt-2">
                <a href="<?php echo e(route('store.all')); ?>">
                    <button class="btn btn-primary ">Tous les boutiques</button>
                </a>
            </div>
            <div class="stores-swiper-button-next1 swiper-button-next">
                <img src="<?php echo e(asset('img/right.png')); ?>" alt="">
            </div>
            <div class="swiper-button-prev stores-swiper-button-prev1">
                <img src="<?php echo e(asset('img/left.png')); ?>" alt="">
            </div>
        </div>
    </section>

    <!-- end section : stores -->

    <!-- start section : marques -->

    <section class="marques-section">
        <div class='container marques-swiper'>
            <h2 class="marques-title section-title"><span>Nos marques</span></h2>
            <div class="swiper mySwiper marquesSwiper px-4">
                <div class="swiper-wrapper m-4 mx-auto">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="<?php echo e(asset('pictures/Brands/' . $item->picture)); ?>" alt="marque">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="d-flex justify-content-md-end justify-content-center mt-md-4 mt-2">
                <a href="<?php echo e(route('store.marques')); ?>">
                    <button class="btn btn-primary ">Tous les marques</button>
                </a>

            </div>
            <div class="swiper-button-next1 swiper-button-next">
                <img src="<?php echo e(asset('img/right.png')); ?>" alt="">
            </div>
            <div class="swiper-button-prev swiper-button-prev1">
                <img src="<?php echo e(asset('img/left.png')); ?>" alt="">
            </div>

        </div>
    </section>

    <!-- end section : marques -->


   
        <section class="create-store">
            <div class="container">
                <h2 class="create-store-title section-title"><span>Créez votre boutique en ligne</span></h2>
                <h4 class="font-weight-500 text-center mb-3">Présentez vos produit sur TendAxe et obtenez plus de clients
                </h4>
                <p class=" text-center mb-3 mx-auto">
                    En tant que Distributeur Digital et marketplace B2B TendAxe, vousproposez d'avoir une boutique en ligne
                    avec
                    une
                    solution complète de gestiondes commandes et des ventes; garantissant une présence en ligne avec
                    uneexpérience
                    client optimale
                </p>
            </div>
            <div class="my-4 create-store-points py-5">
                <div class="container">
                    <div class="create-store-point-box text-center">
                        <img src="<?php echo e(asset('img/store-create.png')); ?>" alt="">
                        <h6 class="my-3">Création de Boutique en Ligne</h6>
                        <p class="desc-store">Nous concevrons et configurerons une boutique en ligne personnaliséesur
                            TendAxe,
                            mettant en valeur vos gamme de produits supergros.</p>
                    </div>
                    <div class="create-store-point-box text-center">
                        <img src="<?php echo e(asset('img/chartup.jpg')); ?>" alt="" height="60" width="80">
                        <h6 class="my-3">Augmenter les ventes</h6>
                        <p class="desc-store">Nous concevrons et configurerons une boutique en ligne personnaliséesur
                            TendAxe,
                            mettant en valeur vos gamme de produits supergros.</p>
                    </div>
                    <div class="create-store-point-box text-center">
                        <img src="<?php echo e(asset('img/orders.png')); ?>" alt="">
                        <h6 class="my-3">Création de Boutique en Ligne</h6>
                        <p class="desc-store">Nous concevrons et configurerons une boutique en ligne personnaliséesur
                            TendAxe,
                            mettant en valeur vos gamme de produits supergros.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <a href="<?php echo e(route('store.create')); ?>" class="mt-5">
                        <button class="btn btn-primary ">Créer Votre Store</button>
                    </a>
                </div>
            </div>
        </section>





    <!-- start section : marques-section -->

    <section class="marques-section">
        <div class='container marques-swiper'>
            <h2 class="marques-title section-title"><span>ils nous font confiance</span></h2>
            <div class="swiper mySwiper marquesSwiper px-4">
                <div class="swiper-wrapper m-4 mx-auto">
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="<?php echo e(asset('pictures/Partners/' . $item->picture)); ?>" alt="marque">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <div class="d-flex justify-content-md-end justify-content-center mt-md-4 mt-2">
                <a href="<?php echo e(route('store.marques')); ?>">
                    <button class="btn btn-primary ">Tous les marques</button>
                </a>

            </div>
            <div class="swiper-button-next1 swiper-button-next">
                <img src="<?php echo e(asset('img/right.png')); ?>" alt="">
            </div>
            <div class="swiper-button-prev swiper-button-prev1">
                <img src="<?php echo e(asset('img/left.png')); ?>" alt="">
            </div>

        </div>
    </section>

    <!-- end section : marques-section -->



    <!-- start section : testimonials -->

    <section class="testimonials">
        <div class='container'>
            <h2 class="testimonials-title"><span>Témoignages</span></h2>
            <div class="swiper testimonialsSwiper px-4">
                <div class="swiper-wrapper m-4 mx-auto">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="testimonial-box">
                                <p class="testimonial-text">
                                    <?php echo e($item->content); ?>

                                </p>
                                <div class="testimonial-profil-icon-wrapper">
                                    <div class="testimonial-profil-box">
                                        <img src="<?php echo e(asset('pictures/Testimonials/' . $item->picture)); ?>"
                                            alt="testimonial profil logo" class="testimonial-profil-logo">
                                        <div class="testimonial-profil-info">
                                            <h6 class="testimonial-name">
                                                <?php echo e($item->name); ?>

                                            </h6>
                                            <span class="testimonial-post">
                                                <?php echo e($item->position); ?>

                                            </span>
                                            <span class="testimonial-company">
                                                <?php echo e($item->company); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <img src="<?php echo e(asset('img/testimenial-icon.png')); ?>" alt=""
                                        class="testimonial-icon">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="testimonials-swiper-pagination"></div>
            </div>
            <div class="testimonials-swiper-button-next1 swiper-button-next">
                <img src="<?php echo e(asset('img/right.png')); ?>" alt="">
            </div>
            <div class="swiper-button-prev testimonials-swiper-button-prev1">
                <img src="<?php echo e(asset('img/left.png')); ?>" alt="">
            </div>

        </div>
    </section>

    <!-- end section : testimonials -->



    <!-- start section : contact-us -->

    <section class="contact-us">
        <div class="contact-us-head"></div>
        <div class="container">
            <div class="contact-us-wrapper">
                <div class="contact-desc">
                    <h3 class="contact-desc-title">Contactez-nous</h3>
                    <p class="contact-desc-text contact-desc-text-first">
                        Besoin d'une information produit, d'un devis ? Nos équipes sont à votre écoute 7 jours sur 7 via le
                        formulaire de contact.
                    </p>
                    <p class="contact-desc-text contact-desc-text-two">
                        Choisissez l'objet de votre demande et l'un de nos spécialistes vous re-contactera dans les plus
                        brefs délais.
                    </p>
                    <a href="<?php echo e(route('contact.create')); ?>" class="contact-link"><i
                            class="bi bi-envelope-fill"></i>Contactez-nous</a>
                </div>
                <div class="contact-details">
                    <div class="contact-phone">
                        <h5 class="contact-phone-title">Contactez-nous par téléphone</h5>
                        <div class="contact-phone-box">
                            <i class="bi bi-telephone-fill"></i>
                            <span class="phone-number phone-number-national">07 78 33 00 81
                            </span>
                        </div>
                        <div class="contact-phone-international">
                            <div class="contact-phone-box">
                                <i class="bi bi-telephone-fill"></i>
                                <span class="phone-number phone-number-international">+213 778 33 00 81
                                </span>
                            </div>
                            <p>International sales <br> and experts advices</p>
                        </div>
                    </div>
                    <div class="contact-adress">
                        <h5 class="contact-adress-title">notre siège</h5>
                        <div class="contact-adress-box">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span class="adress">LOT N 141 P 10 Rue Aouicha Amer BOUINAN- BLIDA</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section : contact-us -->



    <section id="acheteurs" class="d-none container" style="margin-top: 30vh; margin-bottom: 20vh;">
        <h1 class="font-weight-600 text-center text-gray">Nos acheteurs actifs</h1>
        <div class="text-center my-5">
            <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/1.png" alt="">
        </div>
        <div class="row justify-content-center my-4 hide-md">
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/2.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/3.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/4.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/5.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/6.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/7.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/8.png" alt="">
            </div>
        </div>
        <div class="row justify-content-center my-4 hide-md">
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/9.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/10.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/11.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/12.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/13.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/14.png" alt="">
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/15.png" alt="">
            </div>
        </div>


        <div class="row show-md justify-content-center">
            <div class="col-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/9.png" alt="">
            </div>
            <div class="col-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/14.png" alt="">
            </div>

        </div>
        <div class="row show-md">
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/4.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/5.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/6.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/7.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/8.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/2.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/10.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/11.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/3.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/15.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/12.png" alt="">
            </div>
            <div class="col-3 my-3 text-center">
                <img class="img-fluid" src="http://test.tendaxe.com/img/acheteurs/13.png" alt="">
            </div>


        </div>
    </section>

    <!-- demander Modal -->
    <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Demander un Pack</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control selectpicker" onchange="UpdateMaxSect(this)" name="pack"
                                id="pack">
                                <option value="bronze">Bronze</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="platine">Platine</option>
                                <option value="ultra">Ultra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control selectpicker" multiple data-title="Secteurs" name="secteurs[]"
                                id="sect">
                                <option value="1" data-tokens="Bâtiments et Génie civil">
                                    Bâtiments et Génie civil</option>
                                <option value="2" data-tokens="Travaux Publics">
                                    Travaux Publics</option>
                                <option value="3" data-tokens="Hydraulique et Environnement">
                                    Hydraulique et Environnement</option>
                                <option value="4" data-tokens="Architecture, Urbanisme, contrôle et suivi">
                                    Architecture, Urbanisme, contrôle et suivi</option>
                                <option value="5"
                                    data-tokens="Equipement et Consommable industriel, pièce de rechange">
                                    Equipement et Consommable industriel, pièce de rechange</option>
                                <option value="6" data-tokens="Etude, Consulting, Formation et Certification">
                                    Etude, Consulting, Formation et Certification</option>
                                <option value="7" data-tokens="Papier, carton, emballage, plastique et caoutchouc">
                                    Papier, carton, emballage, plastique et caoutchouc</option>
                                <option value="8" data-tokens="Informatique, Bureautique, Logiciels et multimédia">
                                    Informatique, Bureautique, Logiciels et multimédia</option>
                                <option value="9" data-tokens="Mines ,carrières et matériaux de construction">
                                    Mines ,carrières et matériaux de construction</option>
                                <option value="10"
                                    data-tokens="Equipement et Consommable scientifique , médical et laboratoire">
                                    Equipement et Consommable scientifique , médical et laboratoire</option>
                                <option value="11" data-tokens="Véhicule et équipement de transport">
                                    Véhicule et équipement de transport</option>
                                <option value="12" data-tokens="Industrie électrique et Electrotechnique">
                                    Industrie électrique et Electrotechnique</option>
                                <option value="13"
                                    data-tokens="Industries électroniques ,matériel audio-visuel et électroménager">
                                    Industries électroniques ,matériel audio-visuel et électroménager</option>
                                <option value="14" data-tokens="Agriculture, Elevage, Forêts et Pêche">
                                    Agriculture, Elevage, Forêts et Pêche</option>
                                <option value="15"
                                    data-tokens="Assurance, Comptabilité, finance et services juridique">
                                    Assurance, Comptabilité, finance et services juridique</option>
                                <option value="16" data-tokens="Ameublement &amp; mobilier de bureau et décoration">
                                    Ameublement &amp; mobilier de bureau et décoration</option>
                                <option value="17" data-tokens="Chimie, Pétrochimie et matières premières">
                                    Chimie, Pétrochimie et matières premières</option>
                                <option value="18" data-tokens="Energie et Service pétrolier">
                                    Energie et Service pétrolier</option>
                                <option value="19" data-tokens="Equipement de cuisine, collectivités locales">
                                    Equipement de cuisine, collectivités locales</option>
                                <option value="20" data-tokens="Sports, loisirs et services sociaux">
                                    Sports, loisirs et services sociaux</option>
                                <option value="21" data-tokens="Industrie sidérurgique, Métallurgique et Mécanique">
                                    Industrie sidérurgique, Métallurgique et Mécanique</option>
                                <option value="22" data-tokens="Impression, Edition, Communication et marketing">
                                    Impression, Edition, Communication et marketing</option>
                                <option value="23" data-tokens="Pharmacie et Parapharmacie">
                                    Pharmacie et Parapharmacie</option>
                                <option value="24" data-tokens="Tourismes, Hôtellerie, Voyage et Catering">
                                    Tourismes, Hôtellerie, Voyage et Catering</option>
                                <option value="25" data-tokens="Télécommunication, internet et réseaux">
                                    Télécommunication, internet et réseaux</option>
                                <option value="26" data-tokens="Sécurité, gardiennage , télésurveillance et incendie">
                                    Sécurité, gardiennage , télésurveillance et incendie</option>
                                <option value="27" data-tokens="Immobilier">
                                    Immobilier</option>
                                <option value="28" data-tokens="Transit et dédouanement">
                                    Transit et dédouanement</option>
                                <option value="29" data-tokens="Nettoyage et traitement des déchets">
                                    Nettoyage et traitement des déchets</option>
                                <option value="30" data-tokens="Aménagement urbain et espace vert">
                                    Aménagement urbain et espace vert</option>
                                <option value="31" data-tokens="Services">
                                    Services</option>
                                <option value="32" data-tokens="Froid et climatisation">
                                    Froid et climatisation</option>
                                <option value="33" data-tokens="Agro-alimentaire">
                                    Agro-alimentaire</option>
                                <option value="34" data-tokens="Engin de travaux publics et manutention">
                                    Engin de travaux publics et manutention</option>
                                <option value="35" data-tokens="Habillement, textile et dotation vestimentaire">
                                    Habillement, textile et dotation vestimentaire</option>
                                <option value="36" data-tokens="Prestation de maintenance">
                                    Prestation de maintenance</option>
                                <option value="37" data-tokens="Autre">
                                    Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" id="demander"
                            onclick="demander_pack($(this))">Demander</button>
                        <button class="btn btn-info" type="button" id="loading" disabled style="display: none">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Demander
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body" id="resultat_demande">
                    <h5 class="bold mb-4">
                        voila les détails de l'abonnement choisie:
                    </h5>
                    <div class="mb-2">
                        <b>Le pack: </b>
                        <span id="selected_pack"></span>
                    </div>
                    <div class="bold">Les secteurs:</div>
                    <ul class="mb-0" id="selected_secteurs">

                    </ul>
                    <div class="">
                        <b>Prix:</b>
                        <span id="prix"></span>
                    </div>
                    <div class="mt-4">
                        votre demande va prendre en charge <span class="">par les administrateurs dés la réception de
                            votre reçu de payement ( par viber 0778 33 00 81 , notre e-mail tendaxe@gmail.com ou à travers
                            une présence au niveau de notre bureau )</span>
                    </div>
                    <div class="mt-3 text-right">
                        <button type="button" class="btn btn-primary px-4" data-dismiss="modal">OK</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Erreur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Votre demande n'a pas été effectuer, veuillez réessayer plus tard.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-3" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function changeQty(button, delta) {
            // Get the input field that corresponds to the current button
            let input = button.parentElement.querySelector('input[type="number"]');
            let currentValue = parseInt(input.value) || 1;

            // Set new quantity value, ensuring it doesn't go below 1
            let newValue = currentValue + delta;
            if (newValue < 1) newValue = 1;

            // Update the input value with the new quantity
            input.value = newValue;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('form[id^="add-to-cart-form"]').on('submit', function(event) {
                event.preventDefault();

                var form = $(this);
                var formData = form.serialize();

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    success: function(response) {
                        // Update the cart total price in the UI
                        $('.cart-price').html(response.cartTotal.toFixed(2) +
                            ' <span>DZD</span>'); // Update cart price

                        // Optionally display a success message
                        alert(response.message);
                    },
                    error: function(response) {
                        alert('Something went wrong. Please try again.');
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/home.blade.php ENDPATH**/ ?>