<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Empresas</h3>
        <div class="row">
          <div class="col-8">

            <form action="" method="post">

              <input type="text" name="name" id="searchEnterprise" class="form-control" placeholder="buscar empresa" oninput="search(this.value)">
            </form>
          </div>

          <div class="col-4">
            <?php if ($user->getRol() == ADMIN) { ?>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>enterprise/create"><i class="far fa-plus-square"></i></a>
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
                      <a class="btn btn-warning" href="<?php echo FRONT_ROOT ?>enterprise/update/<?php echo $empresa->getId() ?>"><i class="far fa-edit text-light text-center"></i></a>
                      <?php if ($empresa->getActive()) { ?>
                        <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>enterprise/delete/<?php echo $empresa->getId() ?>"><i class="far fa-trash-alt"></i></a>
                      <?php } else { ?>
                        <a class="btn btn-success" href="<?php echo FRONT_ROOT ?>enterprise/delete/<?php echo $empresa->getId() ?>"><i class="fas fa-undo-alt"></i></a>
                      <?php } ?>
                    <?php } else { ?>
                      <a href="<?php echo FRONT_ROOT ?>enterprise/description/<?php echo $empresa->getId() ?>" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
                      <a href="<?php echo FRONT_ROOT ?>enterprise/jobs/<?php echo $empresa->getId() ?>" class="btn btn-info text-light"><i class="fas fa-newspaper"></i></a>
                    <?php } ?>
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