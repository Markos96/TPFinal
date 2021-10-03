<?php require_once VIEWS_PATH . 'navbar.php'; ?>

<div class="container container__pr">
  <div class="row row__pr">
    <div class="col-7">
      <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Informacion</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <h5 class="card-title fw-bolder card-title__pr">Descripcion:</h5>
          <p class="card-text__pr">Se ha decidido implementar una aplicación web en donde los distintos alumnos de la Universidad Tecnológica Nacional podrán postularse a propuestas laborales. Estas propuestas están relacionadas a las distintas carreras que brinda la universidad.</p>
          <p class="card-text__pr">Los Alumnos de la universidad pueden ingresar a la aplicación ingresando su email dentro de la aplicación. Esto se debe a que la universidad ha creado una base de datos sobre la información de los alumnos registrados dentro de la universidad.</p>
          <hr class="border border-dark border-3" >
          <h6 class="card-title fw-bolder card-title__pr">Sprint 1:</h6>
          <p class="card-text__pr">-Cuando un Alumno ingrese a la aplicación por medio del login, se deberá obtener toda la información de este alumno desde la API.</p>
          <p class="card-text__pr">-El  sistema  deberá  permitir  que  un  usuario  de  tipo  Administrador  pueda:  crear, modificar y eliminar Empresas.</p>
          <p class="card-text__pr">-La persistencia de las empresas será por medio de archivos JSON.</p>
          <p class="card-text__pr">-Un alumno puede consultar la lista de empresas dentro de la aplicación. También, puede consultar la información específica de una empresa.</p>
          <h6 class="card-title fw-bolder card-title__pr">Extra:</h6>
          <p class="card-text__pr">-Un alumno puede filtrar la lista de empresas a través de su nombre.</p>
          <hr class="border border-dark border-3" >
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="d-flex flex-column justify-content-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Empresas</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          This is some text within a card body.
        </div>
      </div>
    </div>
  </div>
</div>