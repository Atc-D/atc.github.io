<!--Confirmation de suppression du compte -->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading"><b>Voulez-vous vraiment supprimer votre compte ?</b> </p>
      </div>
      <!--Body-->
      <div class="modal-body">
        <i class="fa fa-times fa-4x animated rotateIn"></i><br>
        <small>Cette action est irréverssible! </small>
      </div>
      <!--Footer-->
      <div class="modal-footer flex-center">
        <?php echo '<a href="supprimer_get.php?id='.$_SESSION['id'].'" class="btn  btn-outline-secondary-modal">Oui</a>'; ?>
        <a  class="btn  btn-primary-modal waves-effect" data-dismiss="modal">Non</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--.Confirmation de suppression du compte -->
