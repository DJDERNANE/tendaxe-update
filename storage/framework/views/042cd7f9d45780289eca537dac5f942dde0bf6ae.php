<?php if(Auth::check() && Auth::user()->etat === "desactive"): ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Compte desactivé</strong> Veillez contacter Administration pour l'activé.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/components/alert.blade.php ENDPATH**/ ?>