<?php 
require_once VIEWS_PATH . 'navbar.php';

?>
<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder"><?php echo $enterprise->getFirstName() ?></h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <p class="card-text__pr">
            <?php echo $enterprise->getDescription() ?>
          </p>
        </div>
        <a class="btn btn-secondary mb-3" href="<?php echo FRONT_ROOT ?>enterprise">Volver</a>
      </div>
    </div>
  </div>
</div>