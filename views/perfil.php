<?php require_once VIEWS_PATH . 'navbar.php'; ?>

<div class="container">
  <div class="row mx-3">
    <div class="col-12 fs-6 fw-bolder mt-5 p-2 ps-4 text-dark rounded title__pr " style="background-color: #f1f2f6;
background-image: linear-gradient(315deg, #f1f2f6 0%, #c9c6c6 74%);box-shadow: 0 5px 5px rgba(182, 182, 182, 0.75);
">Perfil personal
    </div>
  </div>
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8 ">
      <div class="d-flex flex-column justify-content-center rounded my-4" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Datos del Usuario</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <table class="table table-borderless">
            <tr>
              <th class="text-center" style="font-size: .8rem;">Nombre:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getName() . ' ' . $student->getLastname(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">DNI:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getDni(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Archivo:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getFileNumber(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Genero:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getGender(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Fecha Nacimiento:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getBirthDate(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Email:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getEmail(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Telefono:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getPhoneNumber(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Rol:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getRol(); ?></td>
            </tr>
            <tr>
              <th class="text-center" style="font-size: .8rem;">Carrera:</th>
              <td class="text-center" style="font-size: .8rem;"><?php echo $student->getCareer(); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-2"></div>
  </div>
</div>