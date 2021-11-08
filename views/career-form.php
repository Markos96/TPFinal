<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Carreras</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <form action="<?php echo FRONT_ROOT ?>career/add" method="POST">
            <p class="text-<?php echo (isset($alert) ? $alert->getType() : '') ?> text-center" style="font-size: .8rem;">
              <?php echo (isset($alert) ? $alert->getMessage() : '') ?>
            </p>
            <input class="mb-3 form-control" type="hidden" name="id" value="<?php echo (isset($career) ? $career->getId() : "") ?>">
            <input class="mb-3 form-control" type="text" name="name" value="<?php echo (isset($career) ? $career->getName() : "") ?>" id="" placeholder="Nombre de la carrera">
            <input type="hidden" class="mb-3 form-control" name="active" value="<?php echo (isset($career) ? $career->getActive() : "") ?>">
            <div>
              <button type="submit" class="btn btn-primary"><i class="far fa-share-square"></i></button>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>career"><i class="far fa-caret-square-left"></i></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>