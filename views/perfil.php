<div class="container">
  <div class="row">
    <div class="col-12 fs-6 fw-bolder mt-5 p-2 ps-4 text-dark rounded title__pr " style="background-color: #f1f2f6;
background-image: linear-gradient(315deg, #f1f2f6 0%, #c9c6c6 74%);box-shadow: 0 5px 5px rgba(182, 182, 182, 0.75);
">Perfil personal
    </div>
  </div>
  <div class="row">
    <div class="col-7">
      <div class="d-flex flex-column justify-content-center rounded my-4" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Datos del Usuario</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <p class="card-text__pr">Cualquier error en la información de sus datos personales, puede reportarlo en el Formulario de Contacto y será actualizado a la brevedad.</p>
          <hr class="border border-dark border-3">
          <table class="table table-borderless">
            <tr>
              <th class="text-center" style="font-size: .8rem;">Nombre:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getName() . ' ' . $user->getLastname(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">DNI:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getDni(); ?></td>
            </tr>
            <?php if ($user->getFileNumber() != "") {?>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Archivo:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getFileNumber() ?></td>
            </tr>
            <?php } ?>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Genero:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getGender(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Fecha Nacimiento:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getBirthDate(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Email:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getEmail(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Telefono:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getPhoneNumber(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Rol:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo ($user->getRol() == ADMIN) ? "ADMINISTRADOR" : "ESTUDIANTE"; ?></td>
            </tr>
            <?php if($user->getCareer() != "") { ?>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Carrera:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $user->getCareer() ?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="row">
        <div class="d-flex flex-column justify-content-center rounded my-4" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder">Formulario de Contacto</h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <p class="card-text__pr">En este formulario pueden comunicarse con los administradores para reportar errores en la informacion mostradas en esta pagina.</p>
            <form action="" class="d-flex justify-content-center flex-column w-100" autocomplete="off">
              <div class="mb-3 row">
                <label for="asunto" class="col-sm-2 col-form-label" style="font-size: .8rem;">Asunto</label>
                <div class="col-sm-9 mb-3">
                  <input type="text" name="" id="asunto" class="form-control-plaintext form-control-sm" style="border: 1px solid #dddddd; outline: none; font-size: .8rem;">
                </div>
                <textarea name="description" id="" style="border: 1px solid #DDDDDD; width: 100%; height: 120px; resize: none;" class="mb-3"></textarea>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder">Cambiar contraseña</h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <form action="<?php echo FRONT_ROOT ?>user/changepassword" class="d-flex justify-content-center flex-column w-100" autocomplete="off" method="POST">
              <p class="text-<?php echo (isset($alertPass) ? $alertPass->getType() : '') ?> text-center" style="font-size: .8rem;">
                <?php echo (isset($alertPass) ? $alertPass->getMessage() : '') ?>
              </p>
              <div class="mb-3 row align-items-center">
                <label for="password" class="col-sm-3 col-form-label" style="font-size: .8rem;">Contraseña actual *</label>
                <div class="col-sm-9">
                  <input type="password" name="passwordact" id="password" class="form-control form-control-sm">
                </div>
              </div>
              <div class="mb-3 row align-items-center">
                <label for="password" class="col-sm-3 col-form-label" style="font-size: .8rem;">Contraseña nueva *</label>
                <div class="col-sm-9">
                  <input type="password" name="passwordnew" id="password" class="form-control form-control-sm">
                </div>
              </div>
              <div class="mb-3 row align-items-center">
                <label for="password" class="col-sm-3 col-form-label" style="font-size: .8rem;">Repita contraseña *</label>
                <div class="col-sm-9">
                  <input type="password" name="passwordrep" id="password" class="form-control form-control-sm">
                </div>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>