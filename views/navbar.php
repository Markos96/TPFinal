<nav class="navbar navbar-expand-lg navbar__p navbar-light">
  <div class="container-fluid">
    <div class="col-6">
      <a href="<?php echo FRONT_ROOT ?>" class="navbar-brand"><img src="<?php echo IMG_PATH ?>utn.png" class="img__pr" style="height: 80px; width: 50%"></a>
    </div>
    <div class="col-6">
      <div class="d-flex justify-content-center">

        <button class="navbar-toggler text-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="row collapse navbar-collapse" id="navbarSupportedContent" style="margin-right: 1px;">
        <ul class="navbar-nav d-flex justify-content-end align-items-center">
          <li class="nav-item"><a href="<?php echo FRONT_ROOT ?>student/index" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="<?php echo FRONT_ROOT ?>student/perfil" class="nav-link">Perfil</a></li>
        </ul>
      </div>
      <div class="row d-flex justify-content-center">
        <ul class="navbar-nav" >
          <div class="w-100 d-flex justify-content-center align-items-center d-lg-flex justify-content-lg-end">
            <li class="nav-item me-2">
              <!-- <a class="nav-link text-dark fw-bolder" style="font-size: .8rem;"><?php /* echo $student->getFirstName() . ' ' . $student->getLastName() */ ?></a> -->
              <a class="nav-link text-dark fw-bolder" style="font-size: .8rem;">
              <?php echo $user->getName() . ' ' . $user->getLastname() ?>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo FRONT_ROOT ?>user/logout" class="nav-link text-dark fw-bolder me-2" style="font-size: .8rem;">salir</a>
            </li>
          </div>
        </ul>
      </div>
    </div>
  </div>
</nav>