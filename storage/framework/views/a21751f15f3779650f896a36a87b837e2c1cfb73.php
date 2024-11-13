<?php $__env->startSection('title', 'user detail'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <?php echo e(session('success')); ?>

            </div>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e($error); ?>


                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <div class="bg-white p-3">
        
        <?php if($etab): ?>
            <h4>Etablissement</h4>
            <?php if($etab->logo): ?>
                <img class="rounded-circle" width="120px" src="<?php echo e(asset('storage/logo/' . $etab->logo)); ?>" alt="">
            <?php endif; ?>
            <ul>
                <li>nom etablissement : <?php echo e("$etab->nom_etablissement"); ?></li>
                <li>category : <?php echo e("$etab->category"); ?></li>
                <li>emplacement : <?php echo e("wilaya $etab->wilaya , commune $etab->commune"); ?></li>

            </ul>
            autre infos:
            <ul>
                <?php if($etab->fax): ?>
                    <li>fax : <?php echo e($etab->fax); ?></li>
                <?php endif; ?>
                <?php if($etab->fix): ?>
                    <li>fix : <?php echo e($etab->fix); ?></li>
                <?php endif; ?>
                <?php if($etab->email): ?>
                    <li>email ou site : <?php echo e($etab->email); ?></li>
                <?php endif; ?>
            </ul>
            <hr>
        <?php endif; ?>

        
        <h4>Etat compte</h4>
        <form action="<?php echo e(route('admin.user.etat', $user)); ?>" method="POST" class="row">
            <?php echo csrf_field(); ?>
            <div class="col-6">
                <select class="form-control selectpicker" name="etat" id="">
                    <option value="active" <?php echo e($user->etat === 'active' ? 'selected' : ''); ?>>active</option>
                    <option value="desactive" <?php echo e($user->etat === 'desactive' ? 'selected' : ''); ?>>desactive</option>
                </select>
            </div>
            <div class="col-6">
                <button class="btn btn-info">Changé etat</button>
            </div>
        </form>

        <hr>

        <h4>Etat email verification</h4>
        <form action="<?php echo e(route('admin.user.email', $user)); ?>" method="POST" class="row">
            <?php echo csrf_field(); ?>
            <div class="col-md-6">
                <select class="form-control selectpicker" name="verification">
                    <option value="on" <?php echo e($user->email_verified_at ?? 'selected'); ?>>On</option>
                    <option value="off" <?php echo e(!$user->email_verified_at ? 'selected' : ''); ?>>Off</option>
                </select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-info">Changer</button>
            </div>
        </form>
        <hr>
        
        <h4>Utilisateur</h4>
        <form action="<?php echo e(route('admin.user.details', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row my-3" style="max-width: 600px;">
                <div class="col-4 mb-3">
                    <label for="">Nom</label>
                </div>
                <div class="col-8 mb-3">
                    <input class="form-control" type="text" name="nom" placeholder="<?php echo e($user->nom); ?>">
                </div>
                <div class="col-4 mb-3">
                    <label for="">Prenom</label>
                </div>
                <div class="col-8 mb-3">
                    <input class="form-control" type="text" name="prenom" placeholder="<?php echo e($user->prenom); ?>">
                </div>
                <div class="col-4 mb-3">
                    <label for="">Email</label>
                </div>
                <div class="col-8 mb-3">
                    <input class="form-control" type="email" name="email" placeholder="<?php echo e($user->email); ?>">
                </div>
                <div class="col-4 mb-3">
                    <label for="">Telephone</label>
                </div>
                <div class="col-8 mb-3">
                    <input class="form-control" type="text" name="phone" placeholder="<?php echo e($user->phone); ?>">
                </div>
                <?php if($user->type_user === 'abonné'): ?>
                    <div class="col-4 mb-3">
                        <label for="">Entreprise</label>
                    </div>
                    <div class="col-8 mb-3">
                        <input class="form-control" type="text" name="nom_entreprise"
                            placeholder="<?php echo e($user->nom_entreprise); ?>">
                    </div>
                <?php endif; ?>
                <div class="col-4 mb-3">
                    <label for="">Wilaya</label>
                </div>
                <div class="col-8 mb-3">
                    <select class="wil1 form-control selectpicker" data-live-search="true" name="wilaya"
                        id="user-wilaya"></select>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-info">Modifier</button>
            </div>
        </form>

        <hr>

        
        <h4>Mot de Passe</h4>
        <form action="<?php echo e(route('admin.user.password', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row my-3" style="max-width: 600px;">
                <div class="col-4 mb-3">
                    Nouveau mot de passe
                </div>
                <div class="col-8 mb-3">
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="col-4 mb-3">
                    Repetez mot de passe
                </div>
                <div class="col-8 mb-3">
                    <input class="form-control" type="password" name="password_confirmation">
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-info">Changer</button>
            </div>
        </form>

        <?php if($user->type_user === 'abonné'): ?>
            <hr>
            <h4>Nouvel Abonnement</h4>
            <?php if($user->pending_abonnement): ?>
                <form action="<?php echo e(route('admin.abonnement.edit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="number" name="abonnement_id" value="<?php echo e($user->pending_abonnement->id); ?>" hidden>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">Abonnement choisi</label>
                            <select class="form-control selectpicker" name="nom_abonnement"
                                onchange="abonnement_check(this, 'new')" id="">
                                <option value="bronze"
                                    <?php echo e($user->pending_abonnement->nom_abonnement === 'bronze' ? 'selected' : ''); ?>>Bronze
                                </option>
                                <option value="silver"
                                    <?php echo e($user->pending_abonnement->nom_abonnement === 'silver' ? 'selected' : ''); ?>>Silver
                                </option>
                                <option value="gold"
                                    <?php echo e($user->pending_abonnement->nom_abonnement === 'gold' ? 'selected' : ''); ?>>Gold
                                </option>
                                <option value="platine"
                                    <?php echo e($user->pending_abonnement->nom_abonnement === 'platine' ? 'selected' : ''); ?>>
                                    Platine</option>
                                <option value="ultra"
                                    <?php echo e($user->pending_abonnement->nom_abonnement === 'ultra' ? 'selected' : ''); ?>>Ultra
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Secteurs</label>
                            <select name="secteurs[]" class="form-control mb-2 selectpicker" multiple title="Secteur"
                                data-live-search="true" id="new_sec" required>
                                <?php $__currentLoopData = App\Models\Secteur::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sect->id); ?>"
                                        <?php echo e($user->pending_abonnement->secteur->contains($sect) ? 'selected' : ''); ?>

                                        data-tokens="<?php echo e($sect->secteur); ?>"><?php echo e($sect->secteur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Secteurs</label>
                            <select name="secteurs[]" class="form-control mb-2 selectpicker" multiple title="Secteur"
                                data-live-search="true" id="new_sec" required>
                                <?php $__currentLoopData = App\Models\Secteur::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sect->id); ?>"
                                        <?php echo e($user->pending_abonnement->secteur->contains($sect) ? 'selected' : ''); ?>

                                        data-tokens="<?php echo e($sect->secteur); ?>"><?php echo e($sect->secteur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date debut</label>
                            <input class="form-control" type="date" name="date_debut" value="<?php echo e($date_debut); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date fin</label>
                            <input class="form-control" type="date" name="date_fin"
                                value="<?php echo e(date('Y-m-d', strtotime($date_debut . ' +1 years'))); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Nombre d'utilisateurs</label>
                            <input class="form-control" type="number" name="session_limit" min="1"
                                value="1">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-info">Renouvlé</button>
                    </div>
                </form>
            <?php else: ?>
                <form action="<?php echo e(route('admin.abonnement.store', $user)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">Abonnement choisi</label>
                            <select class="form-control selectpicker" name="nom_abonnement"
                                onchange="abonnement_check(this, 'new')" id="">
                                <option value="gratuit">gratuit</option>
                                <option value="bronze" selected>Bronze</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="platine">Platine</option>
                                <option value="ultra">Ultra</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Secteurs</label>
                            <select name="secteurs[]" class="form-control mb-2 selectpicker" multiple title="Secteur"
                                data-live-search="true" id="new_sec" required>
                                <?php $__currentLoopData = App\Models\Secteur::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sect->id); ?>" data-tokens="<?php echo e($sect->secteur); ?>">
                                        <?php echo e($sect->secteur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date debut</label>
                            <input class="form-control" type="date" name="date_debut" value="<?php echo e($date_debut); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date fin</label>
                            <input class="form-control" type="date" name="date_fin"
                                value="<?php echo e(date('Y-m-d', strtotime($date_debut . ' +1 years'))); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Nombre d'utilisateurs</label>
                            <input class="form-control" type="number" name="session_limit" min="1"
                                value="1">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-info">Renouvlé</button>
                    </div>
                </form>
            <?php endif; ?>

            <hr>

            <h4>Historique d'abonnement</h4>
            <table class="table">
                <tr>
                    <td>Nom Abonnement</td>
                    <td>Date debut</td>
                    <td>Date fin</td>
                    <td>Action</td>
                </tr>
                <?php $__currentLoopData = $user->abonnement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abonnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($abonnement->nom_abonnement); ?></td>
                        <td><?php echo e($abonnement->date_debut); ?></td>
                        <td><?php echo e($abonnement->date_fin); ?></td>
                        <td>
                            <?php if($abonnement->nom_abonnement !== 'gratuit'): ?>
                                <a class="btn btn-danger" href="#" data-toggle="modal"
                                    data-target="#exampleModalCenter" data-id="<?php echo e($abonnement->id); ?>">Supprimer</a>
                            <?php endif; ?>
                            <?php if(new DateTime($abonnement->date_fin) >= new DateTime()): ?>
                                <button class="btn btn-warning" data-id="<?php echo e($abonnement->id); ?>"
                                    onclick="edit_abonnement(this)">Edit</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

            <div class="collapse" id="edit_form">
                <hr>
                <h4>Modifier Abonnement</h4>

                <form id="form_reset" action="<?php echo e(route('admin.abonnement.edit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input id="abonnement_id" type="number" name="abonnement_id" hidden>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">Abonnement choisi</label>
                            <select class="form-control selectpicker" name="nom_abonnement"
                                onchange="abonnement_check(this, 'old')" id="nom_abonnement">
                                <option value="bronze">Bronze</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="platine">Platine</option>
                                <option value="ultra">Ultra</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Secteurs</label>
                            <select name="secteurs[]" class="form-control mb-2" multiple title="Secteur"
                                data-live-search="true" id="secteurs">
                                <?php $__currentLoopData = App\Models\Secteur::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sect->id); ?>" data-tokens="<?php echo e($sect->secteur); ?>">
                                        <?php echo e($sect->secteur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date debut</label>
                            <input id="date_debut" class="form-control" type="date" name="date_debut"
                                value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date fin</label>
                            <input id="date_fin" class="form-control" type="date" name="date_fin" value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Nombre d'utilisateurs</label>
                            <input class="form-control" type="number" name="session_limit" id="session_limit"
                                min="1">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-info">Modifier</button>
                        <a class="btn btn-secondary" data-toggle="collapse" href="#edit_form" role="button"
                            aria-expanded="false" aria-controls="edit_form">Annuler</a>
                    </div>

                </form>
            </div>

            <hr>

            <h4>Notification</h4>
            <form action="<?php echo e(route('admin.notif', $notif)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="row">
                    <div class="col-md-3">
                        <h6 class="mt-2">Etat</h6>
                    </div>
                    <div class="col-md-9 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="frequence" id="inlineRadio1" checked
                                value="none">
                            <label class="form-check-label" for="inlineRadio1">Desactivé</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="frequence" id="inlineRadio2"
                                <?php echo e($notif->frequence === 'everyday' ? 'checked' : ''); ?> value="everyday">
                            <label class="form-check-label" for="inlineRadio2">Active</label>
                        </div>
                        
                    </div>
                </div>

                <hr>

                
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Mots clés</label>
                        <input class="form-control bg-light" type="text" name="keyword">
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->keyword): ?>
                            <ul class="pl-3" style="list-style: none;">
                                
                                <?php $__currentLoopData = $notif->keyword; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" data-id="<?php echo e($item->id); ?>" class="p-0"
                                            onclick="keyword2($(this))" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>"
                                                alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->keyword); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>

                
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control selectpicker" multiple data-live-search="true" name="secteur[]"
                            id="">
                            
                            <?php $__currentLoopData = App\Models\Secteur::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sect->id); ?>" data-tokens="<?php echo e($sect->secteur); ?>">
                                    <?php echo e($sect->secteur); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->secteur): ?>
                            <ul class="pl-3" style="list-style: none;">
                                
                                <?php $__currentLoopData = $notif->secteur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" data-id="<?php echo e($item->id); ?>" onclick="sect($(this))"
                                            class="p-0" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>"
                                                alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->secteur); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>

                
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control wil1 selectpicker" multiple data-live-search="true" name="wilaya[]"
                            id="notif-wilaya"></select>
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->wilaya): ?>
                            <ul class="pl-3" style="list-style: none;">
                                <?php $__currentLoopData = $notif->wilaya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" class="p-0" data-id="<?php echo e($item->id); ?>"
                                            onclick="wilaya($(this))" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>"
                                                alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->wilaya); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <select name="statut[]" class="form-control mb-2 selectpicker" title="statut"
                            data-live-search="true" multiple>
                            <option value="Mise en demeure et résiliation" data-tokens="Mise en demeure et résiliation">
                                Mise en demeure et résiliation</option>
                            <option value="Adjudication" data-tokens="Adjudication">Adjudication</option>
                            <option value="Vente aux enchères" data-tokens="Vente aux enchères">Vente aux enchères
                            </option>
                            <option value="Infructuosité" data-tokens="Infructuosité">Infructuosité</option>
                            <option value="Annulation" data-tokens="Annulation">Annulation</option>
                            <option value="Attribution de marché" data-tokens="Attribution de marché">Attribution de
                                marché</option>
                            <option value="Prorogation de délai" data-tokens="Prorogation de délai">Prorogation de délai
                            </option>
                            <option value="Appel d'offres & Consultation" data-tokens="Appel d'offres & Consultation">
                                Appel d'offres & Consultation</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->statut): ?>
                            <ul class="pl-3" style="list-style: none;">
                                <?php $__currentLoopData = $notif->statut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" class="p-0" data-id="<?php echo e($item->id); ?>"
                                            onclick="statut($(this))" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>"
                                                alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->statut); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-right">
                    <button class="btn btn-primary px-4">Appliquer</button>
                </div>
            </form>

        <?php endif; ?>





        
        <?php if($user->type_user === 'abonné'): ?>
            <hr>
            <div class="d-flex justify-content-between">
                <h4>Boutiques</h4>
                <button class="btn btn-info">Ajouter</button>
            </div>


            <form action="<?php echo e(route('admin.store.abonnemnt.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Boutiques :</label>
                        <select class="form-control selectpicker" name="store_id" id="">
                            <?php $__currentLoopData = $user->store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($store->id); ?>">
                                    <?php echo e($store->storeName); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Nombre d'utilisateurs</label>
                        <input class="form-control" type="number" name="users" min="1" value="1">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Abonnement</label>
                        <select name="abnm" class="form-control mb-2 selectpicker" title="Secteur"
                            onchange="getpoints(this)">
                            <option value="pourcentage">Pourcentage</option>
                            <option value="tres basic" data-points='20'>tres Basic</option>
                            <option value="basic" data-points='50'>Basic</option>
                            <option value="meduim" data-points='100'>meduim</option>
                            <option value="ultra" data-points='250'>ultra</option>
                            <option value="gold" data-points='500'>gold</option>
                            <option value="Static" data-points='0'>Static</option>

                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="" id="points-label">Points</label>
                        <input class="form-control" type="number" name="points" min="5" value="5"
                            id="points" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Date debut</label>
                        <input class="form-control" type="date" name="date_debut" value="<?php echo e($date_debut); ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Date fin</label>
                        <input class="form-control" type="date" name="date_fin"
                            value="<?php echo e(date('Y-m-d', strtotime($date_debut . ' +1 years'))); ?>">
                    </div>

                </div>
                <div class="text-right">
                    <button class="btn btn-info">Renouvlé</button>
                </div>
            </form>

            <hr>

            <h4>Historique d'abonnement de boutique</h4>
            <?php $__currentLoopData = $user->store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul>
                    <li>
                        <p>Boutique : <b><?php echo e($store->storeName); ?></b> </p>
                    </li>
                    <table class="table">
                        <tr>

                            <td>Abonnement</td>
                            <td>Date debut</td>
                            <td>Date fin</td>
                            <td>Action</td>
                        </tr>

                        <?php $__currentLoopData = $store->abonnement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abnm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($abnm->nom_abonnement); ?></td>
                                <td><?php echo e($abnm->date_debut); ?></td>
                                <td><?php echo e($abnm->date_fin); ?></td>
                                <td>
                                    <?php if($abnm->nom_abonnement !== 'gratuit'): ?>
                                        <a class="btn btn-danger" href="#" data-toggle="modal"
                                            data-target="#exampleModalCenter" data-id="<?php echo e($abnm->id); ?>">Supprimer</a>
                                    <?php endif; ?>
                                    <?php if(new DateTime($abnm->date_fin) >= new DateTime()): ?>
                                        <button class="btn btn-warning" data-id="<?php echo e($abnm->id); ?>"
                                            onclick="edit_abonnement(this)">Edit</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </ul>



            <div class="collapse" id="edit_form">
                <hr>
                <h4>Modifier Abonnement</h4>

                <form id="form_reset" action="<?php echo e(route('admin.abonnement.edit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input id="abonnement_id" type="number" name="abonnement_id" hidden>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">Abonnement choisi</label>
                            <select class="form-control selectpicker" name="nom_abonnement"
                                onchange="abonnement_check(this, 'old')" id="nom_abonnement">
                                <option value="bronze">Bronze</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="platine">Platine</option>
                                <option value="ultra">Ultra</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Secteurs</label>
                            <select name="secteurs[]" class="form-control mb-2" multiple title="Secteur"
                                data-live-search="true" id="secteurs">
                                <?php $__currentLoopData = App\Models\Secteur::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sect->id); ?>" data-tokens="<?php echo e($sect->secteur); ?>">
                                        <?php echo e($sect->secteur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date debut</label>
                            <input id="date_debut" class="form-control" type="date" name="date_debut"
                                value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Date fin</label>
                            <input id="date_fin" class="form-control" type="date" name="date_fin" value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Nombre d'utilisateurs</label>
                            <input class="form-control" type="number" name="session_limit" id="session_limit"
                                min="1">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-info">Modifier</button>
                        <a class="btn btn-secondary" data-toggle="collapse" href="#edit_form" role="button"
                            aria-expanded="false" aria-controls="edit_form">Annuler</a>
                    </div>

                </form>
            </div>

            <hr>

        <?php endif; ?>
        

    </div>

    <!-- delete modal -->
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
                    Voulez vous supprimer cet Abonnement?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
                    <form method="POST" action="<?php echo e(route('admin.abonnement.destroy')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="number" name="abonnement" id="abonnement" hidden>
                        <button class="btn btn-info">Oui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#exampleModalCenter').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')

            $('#abonnement').val(id);
        });

        wilaya1();

        function edit_abonnement(e) {
            var id = $(e).data('id');
            // hide current form
            $("#edit_form").collapse('hide');

            $("#form_reset").trigger("reset");

            // get the date
            $.get("/admin/abonnement/" + id, function(data, status) {
                if (status === 'success') {
                    // fill the form
                    $('#abonnement_id').val(data.id);
                    $('#nom_abonnement').val(data.nom_abonnement);
                    $('#nom_abonnement').selectpicker('refresh');
                    $('#date_debut').val(data.date_debut);
                    $('#date_fin').val(data.date_fin);
                    $('#session_limit').val(data.session_limit);

                    var secteur = [];
                    for (var k in data.secteur) {
                        secteur.push(data.secteur[k].id);
                    }
                    $('#secteurs').val(secteur);
                    $('#secteurs').selectpicker();

                    $("#edit_form").collapse('show');
                }
            });

        }

        function abonnement_check(e, type) {
            console.log(e.value);
            if (type === 'new') {
                var target = $('#new_sec');
                var target_select = $('#new_sec option');
            } else {
                var target = $('#secteurs');
                var target_select = $('#secteurs option');
            }

            if (e.value === "gratuit" || e.value === 'ultra') {
                // select all secteurs 
                target_select.prop("selected", "selected");
                target.selectpicker('refresh');

            } else {
                // deselect all 
                target_select.prop("selected", false);
                target.selectpicker('refresh');

            }
        }

        $("#notif-wilaya option[value='Aucun']").remove();

        function sect(e) {
            var id = e.data('id');
            var url = "/admin/notif/sect/" + <?php echo e($user->id); ?> + "/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if (status === 'success') {
                        e.parent('li').remove();
                    }
                }
            });

        }

        function keyword2(e) {
            var id = e.data('id');
            var url = "/settings/notif/keyword/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if (status === 'success') {
                        e.parent('li').remove();
                    }
                }
            });
        }

        function wilaya(e) {
            var id = e.data('id');
            var url = "/settings/notif/wilaya/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if (status === 'success') {
                        e.parent('li').remove();
                    }
                }
            });
        }

        function statut(e) {
            var id = e.data('id');
            var url = "/settings/notif/statut/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if (status === 'success') {
                        e.parent('li').remove();
                    }
                }
            });
        }

        function getpoints(e) {
            var selectedIndex = e.selectedIndex;
            var selectedOption = e.options[selectedIndex];
            var points = selectedOption.getAttribute('data-points');
            var pointsValue = document.getElementById('points');
            var pointsLabel = document.getElementById('points-label');
            if (points == 0) {
                pointsValue.removeAttribute('readonly');
            } else {
                pointsValue.setAttribute('readonly', 'readonly');
                pointsValue.value = points;
            }

            if (e.value === 'pourcentage') {
                pointsLabel.textContent = 'Pourcentage(%) : ';
            } else {
                pointsLabel.textContent = 'Points';
            }
        }
    </script>

    <?php if($user->wilaya): ?>
        <script>
            $("#user-wilaya").val("<?php echo e($user->wilaya); ?>");
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/userdetail.blade.php ENDPATH**/ ?>