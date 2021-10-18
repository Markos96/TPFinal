<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Empresas</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <form action="<?php echo FRONT_ROOT ?>enterprise/add" method="POST">
            <input class="mb-3 form-control" type="hidden" name="id" value="<?php echo ( isset( $enterprise ) ? $enterprise->getId() : "") ?>">
            <input class="mb-3 form-control" type="text" name="firstName" value="<?php echo ( isset( $enterprise ) ? $enterprise->getFirstName() : "" ) ?>" id="" placeholder="Nombre empresa">
            <textarea class="mb-3 form-control" name="description" style="resize: none;font-size: .8rem; height: 200px"><?php echo ( isset( $enterprise ) ? $enterprise->getDescription() : "" ) ?></textarea>
            <div>
              <button type="submit" class="btn btn-primary">enviar</button>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>enterprise">Volver</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>