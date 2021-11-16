<div class="container container__pr">
  <div class="row row__pr">
    <div class="col-7">
      <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Informacion</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <h5 class="card-title fw-bolder card-title__pr">Descripcion:</h5>
          <p class="card-text__pr">Se ha decidido implementar una aplicación web en donde los distintos alumnos de la Universidad Tecnológica Nacional podrán postularse a propuestas laborales. Estas propuestas están relacionadas a las distintas carreras que brinda la universidad.</p>
          <p class="card-text__pr">Los Alumnos de la universidad pueden ingresar a la aplicación ingresando su email dentro de la aplicación. Esto se debe a que la universidad ha creado una base de datos sobre la información de los alumnos registrados dentro de la universidad.</p>
          <hr class="border border-dark border-3">
          <h6 class="card-title fw-bolder card-title__pr">Sprint 1:</h6>
          <p class="card-text__pr">-Cuando un Alumno ingrese a la aplicación por medio del login, se deberá obtener toda la información de este alumno desde la API.</p>
          <p class="card-text__pr">-El sistema deberá permitir que un usuario de tipo Administrador pueda: crear, modificar y eliminar Empresas.</p>
          <p class="card-text__pr">-La persistencia de las empresas será por medio de archivos JSON.</p>
          <p class="card-text__pr">-Un alumno puede consultar la lista de empresas dentro de la aplicación. También, puede consultar la información específica de una empresa.</p>
          <h6 class="card-title fw-bolder card-title__pr">Extra:</h6>
          <p class="card-text__pr">-Un alumno puede filtrar la lista de empresas a través de su nombre.</p>
          <hr class="border border-dark border-3">
          <h6 class="card-title fw-bolder card-title__pr">Sprint 2:</h6>
          <p class="card-text__pr">-Implementar todos los DAO utilizando Base de Datos.</p>
          <p class="card-text__pr">-Registro y persistencia de los usuarios dentro de la base de datos, validando su informacion contra la API</p>
          <p class="card-text__pr">-Alta, Baja y Modificacion de los Job Offers. Se deben asociar la informacion de las carreras de la API para crear nuevo puestos ademas de su Job Position.</p>
          <p class="card-text__pr">-Un alumno se puede postular a UN solo Job Offer</p>
          <h6 class="card-title fw-bolder card-title__pr">Extra:</h6>
          <p class="card-text__pr">-Implementar filtros para Job Offers (ya sea por carrera o Job Position)</p>
          <p class="card-text__pr">-Implementar validaciones para el formulario de carga de una nueva empresa (Ya sea un unico nombre de empresa, unico CUIT, fechas, campos, ETC)</p>
          <hr class="border border-dark border-3">
        </div>
      </div>
    </div>
    <div class="col-5">
      <?php if($user->getRol() != ENTERPRISE) { ?>
      <div class="row">
        <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder">Empresas</h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <a href="<?php echo FRONT_ROOT ?>enterprise" class="nav-link text-center text-dark fs-6">Listar Empresas</a>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php if ($user->getRol() == ADMIN) { ?>
      <div class="row mt-3">
        <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder">Usuarios</h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <a class="nav-link text-center text-dark fs-6" href="<?php echo FRONT_ROOT ?>user/all">Usuarios</a>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php if ($user->getRol() == ADMIN) { ?>
      <div class="row mt-3">
        <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder">Carreras</h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <a class="nav-link text-center text-dark fs-6" href="<?php echo FRONT_ROOT ?>career">Carreras</a>
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="row mt-3">
        <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder"><?php echo ($user->getRol() == ENTERPRISE) ? 'Trabajos Publicados' : 'Trabajos' ?></h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <a class="nav-link text-center text-dark fs-6" href="<?php echo FRONT_ROOT ?><?php echo ($user->getRol() == ENTERPRISE) ? "enterprise/jobs/" . $info->getId()  : "job"?>" ><?php echo ($user->getRol() == ENTERPRISE) ? 'Trabajos Publicados' : 'Trabajos' ?></a>
          </div>
        </div>
      </div>
      <?php if($user->getRol() == STUDENT) {?>
      <div class="row mt-3">
        <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder">Mis postulaciones</h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <a class="nav-link text-center text-dark fs-6" href="<?php echo FRONT_ROOT ?>job/postulations/<?php echo $user->getId()?>">Postulaciones</a>
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="row mt-3">
        <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
          <h3 class="card-title text-center fs-6 my-3 fw-bolder">Campus Virtual</h3>
          <div class="align-self-center card-body mb-3 card-body__pr">
            <a class="card-title text-dark fs-6" href="https://campus.mdp.utn.edu.ar" target="_blank">Campus Virtual MDP <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>