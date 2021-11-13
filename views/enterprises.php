<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Empresas</h3>
        <div class="row">
          <div class="col-12">

            <form action="" method="post">

              <input type="text" name="name" id="searchEnterprise" class="form-control mb-3" placeholder="buscar empresa" oninput="search(this.value)">
            </form>
          </div>

          <div class="col-12">
            <?php if ($user->getRol() == ADMIN) { ?>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>enterprise/create"><i class="far fa-plus-square"></i></a>
              <a class="btn btn-warning text-light fw-bolder" href="<?php echo FRONT_ROOT ?>enterprise/inactives">INACTIVAS</a>
              <a class="btn btn-success text-light fw-bolder" href="<?php echo FRONT_ROOT ?>enterprise/">ACTIVAS</a>
            <?php } ?>
          </div>
        </div>

        <div class="card-body my-3 card-body__pr">
          <table class="table text-center">
            <thead>

              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
              </tr>

            </thead>
            <tbody id="info">

              <?php foreach ($enterprises as $empresa) { ?>
                <tr>
                  <td><?php echo $empresa->getId(); ?></td>
                  <td><?php echo $empresa->getName(); ?></td>
                  <td>
                    <?php if ($user->getRol() == ADMIN) { ?>
                      <a href="<?php echo FRONT_ROOT ?>enterprise/jobs/<?php echo $empresa->getId() ?>" class="btn btn-info text-light"><i class="fas fa-newspaper"></i></a>
                    <?php } else { ?>
                      <a href="<?php echo FRONT_ROOT ?>enterprise/jobs/<?php echo $empresa->getId() ?>" class="btn btn-info text-light"><i class="fas fa-newspaper"></i></a>
                    <?php } ?>
                    <a href="<?php echo FRONT_ROOT ?>enterprise/description/<?php echo $empresa->getId() ?>" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>