<?php
if (isset($_SESSION['loggedUser'])) {
  $student = $_SESSION['loggedUser'];
} else header('location:' . FRONT_ROOT . 'student/index');
?>
<nav class="navbar navbar-expand-lg navbar__p navbar-light">
  <div class="container-fluid">
    <div class="row d-flex align-items-center">
      <div class="col-6">
        <img class="img__pr" src="<?php echo IMG_PATH ?>utn.png" alt="">
      </div>
      <div class="col-6 ">

          <div class="row dropstart w-25 ms-auto me-2">
            <button class="btn btn-secondary dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="navbar-toggler-icon text-white"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>student/index">Home</a></li>
              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>student/cuenta">Perfil</a></li>
            </ul>
          </div>
        <div class="row">
          <ul class="navbar-nav d-flex flex-row justify-content-end">
            <li class="nav-item">
              <p class="nav-link text-dark fw-bolder" style="font-size: .8rem;"><?php echo $student->getFirstName() . ' ' . $student->getLastName(); ?></p>
            </li>
            <p class="nav-link text-dark fw-bolder mx-3" style="font-size: .8rem;">|</p>
            <li class="nav-item">
              <a href="<?php echo FRONT_ROOT ?>student/logout" class="nav-link text-dark fw-bolder me-2" style="font-size: .8rem;">salir</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>