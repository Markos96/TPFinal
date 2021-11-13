<?php
require_once VIEWS_PATH . 'navbar.php';

?>
<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <div class="align-self-center card-body my-3 card-body__pr">
          <h3 class="card-title fs-6 my-3 fw-bolder align-self-start "><?php echo $enterprise->getName() ?></h3>
          <hr class="border border-dark border-3">
          <p class="card-text__pr">
            <?php echo $enterprise->getDescription() ?>
          </p>
          <div class="row">
            <div class="col-3">
              <a href="<?php echo FRONT_ROOT ?>enterprise/jobs/<?php echo $enterprise->getId() ?>" class="btn btn-info text-light"><i class="fas fa-newspaper"></i></a>
            </div>
          </div>
        </div>
        <a class="btn btn-secondary mb-3" href="<?php echo FRONT_ROOT ?>enterprise">Volver</a>
      </div>
    </div>
  </div>
</div>