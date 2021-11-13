<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Empresas</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <p class="text-<?php echo (isset($alert) ? $alert->getType() : '') ?> text-center" style="font-size: .8rem;">
            <?php echo (isset($alert) ? $alert->getMessage() : '') ?>
          </p>
          <form action="<?php echo FRONT_ROOT ?>enterprise/add" method="POST">
            <input class="mb-3 form-control" type="hidden" name="id" value="<?php echo (isset($enterprise) ? $enterprise->getId() : "") ?>">
            <input class="mb-3 form-control" type="text" name="name" value="<?php echo (isset($enterprise) ? $enterprise->getName() : "") ?>" id="" placeholder="Nombre empresa">
            <input class="mb-3 form-control" type="text" name="cuit" value="<?php echo (isset($enterprise) ? $enterprise->getCuit() : "") ?>" id="" placeholder="Cuit/Cuil">
            <textarea class="mb-3 form-control" name="description" style="resize: none;font-size: .8rem; height: 200px"><?php echo (isset($enterprise) ? $enterprise->getDescription() : "") ?></textarea>
            <input type="hidden" class="mb-3 form-control" name="active" value="<?php echo (isset($enterprise) ? $enterprise->getActive() : "") ?>">
            <?php if (isset($enterprise) && $enterprise->getIdUser()) { ?>
              <input class="mb-3 form-control" type="email" name="email" value="<?php echo $enterprise->getIdUser()->getEmail() ?>">
              <input class="mb-3 form-control" type="text" name="rol" value="<?php echo ($enterprise->getIdUser()->getRol() == ENTERPRISE) ? "EMPRESA" : "OTRO" ?>" readonly>
            <?php } ?>
            <div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>enterprise"><i class="fas fa-long-arrow-alt-left"></i></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>