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

            <?php if ($student->getRol() == 'ROLE_ADMIN') { ?>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>enterprise/create">Agregar</a>
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
              <?php foreach ($this->pagination as $empresa) { ?>
                <?php if ($student->getRol() == 'ROLE_ADMIN') { ?>
                  <tr class="<?php echo ($empresa->getIsActive() ? '' : "bg-danger")  ?>">
                    <td><?php echo $empresa->getId(); ?></td>
                    <td><?php echo $empresa->getFirstName(); ?></td>
                    <?php if ($student->getRol() == 'ROLE_ADMIN') { ?>
                      <td>
                        <a class="btn btn-warning" href="<?php echo FRONT_ROOT ?>enterprise/create?id=<?php echo $empresa->getId() ?>&name=<?php echo $empresa->getFirstName() ?>&description=<?php echo $empresa->getDescription() ?>">editar</a>
                        <?php if ($empresa->getIsActive()) { ?>
                          <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>enterprise/delete?id=<?php echo $empresa->getId() ?>">eliminar</a>
                        <?php } else { ?>
                          <a class="btn btn-success" href="<?php echo FRONT_ROOT ?>enterprise/delete?id=<?php echo $empresa->getId() ?>">Alta</a>
                        <?php } ?>
                      </td>
                    <?php } ?>
                  </tr>
                <?php } else { ?>
                  <?php if ($empresa->getIsActive()) { ?>
                    <tr>
                      <td><?php echo $empresa->getId(); ?></td>
                      <td><?php echo $empresa->getFirstName(); ?></td>
                      <td>
                        <a href="<?php echo FRONT_ROOT ?>enterprise/getEnterprise/<?php echo $empresa->getId() ?>" class="btn btn-success">Ver descripcion</a>
                      </td>
                    </tr>
                  <?php } ?>
                <?php } ?>
              <?php } ?>

            </tbody>

          </table>
          <div class="row">
            <div class="col-12 d-flex justify-content-center">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php for ($i = 1; $i <= count($this->listEnterprises); $i++) { ?>
                    <li class="page-item">
                      <button class="border-0" style="background-color: white;" value="<?php $i ?>">
                        <a class="page-link" href="<?php echo FRONT_ROOT ?>enterprise/index/?page=<?php echo $i ?>">
                          <?php echo $i ?>
                        </a>
                      </button>
                    </li>
                  <?php } ?>

                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo JS_PATH ?>script.js"></script>