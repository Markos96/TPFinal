<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Usuarios</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <form action="<?php echo FRONT_ROOT ?>user/add" method="POST">
            <p class="text-<?php echo (isset($alert) ? $alert->getType() : '') ?> text-center" style="font-size: .8rem;">
              <?php echo (isset($alert) ? $alert->getMessage() : '') ?>
            </p>
            <input class="mb-3 form-control" type="hidden" name="id" value="<?php echo ( isset( $us ) ? $us->getId() : "") ?>">
            <input class="mb-3 form-control" type="email" name="email" value="<?php echo ( isset( $us ) ? $us->getEmail() : "" ) ?>" id="" placeholder="Email">
            <input class="mb-3 form-control" type="password" name="password" value="<?php echo ( isset( $us ) ? $us->getPassword() : "" ) ?>" id="" placeholder="Contraseña">
            <input type="hidden" class="mb-3 form-control" name="active" value="<?php echo ( isset( $us ) ? $us->getIsActive() : "" ) ?>">
            <select name="rol" id="" class="form-select mb-3">
              <option value="">-- Seleccione un Rol -- </option>
              <option value="<?php echo ADMIN ?>">Administrador</option>
              <option value="<?php echo STUDENT?>">Estudiante</option>
              <option value="<?php echo ENTERPRISE ?>">Empresa</option>
            </select>
            <div>
              <button type="submit" class="btn btn-primary">Enviar</button>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>enterprise">Volver</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>