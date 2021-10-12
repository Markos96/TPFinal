<div class="container d-flex justify-content-center">
  <div class="row">
    <div class="col-12 d-flex flex-column justify-content-center">
      <div class="row my-5">
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
              <tr>
                <td><?php echo $empresa->getId(); ?></td>
                <td><?php echo $empresa->getFirstName(); ?></td>
                <td>
                  <a class="btn btn-warning" href="<?php echo FRONT_ROOT ?>enterprise/create?id=<?php echo $empresa->getId() ?>&name=<?php echo $empresa->getFirstName()?>&description=<?php echo $empresa->getDescription() ?>">editar</a>
                  <a class="btn btn-danger" href="">eliminar</a>
                </td>
              </tr>
            <?php } ?>

        </tbody>

      </table>

      <nav aria-label="Page navigation example" class="align-self-center">
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

  <script src="<?php echo JS_PATH ?>script.js"></script>