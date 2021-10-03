<?php
if (isset($_SESSION['loggedUser'])) {
  $student = $_SESSION['loggedUser'];
} else header('location:' . FRONT_ROOT . 'student/index');
?>
<nav class="navbar navbar-expand-lg navbar__p">
  <div class="container-fluid">
    <div class="row d-flex justify-content-between align-items-center">
      <div class="col-6">
        <img class="img__pr" src="<?php echo IMG_PATH ?>utn.png" alt="">
      </div>
      <div class="col-6">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex align-items-end flex-column" id="navbarSupportedContent">
          <ul class="navbar-nav text-center">
            <li class="nav-item">
              <a class="nav-link active text-dark" aria-current="page" href="<?php echo FRONT_ROOT ?>student/showPrincipalPage">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo FRONT_ROOT ?>student/perfil">Perfil</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <p class="nav-link text-dark fw-bolder" style="font-size: .8rem;"><?php echo $student->getFirstName() . ' ' . $student->getLastName(); ?></p>
            </li>
            <p class="nav-link text-dark fw-bolder" style="font-size: .8rem;">|</p>
            <li class="nav-item">
              <a href="<?php echo FRONT_ROOT ?>student/logout" class="nav-link text-dark fw-bolder" style="font-size: .8rem;">salir</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>