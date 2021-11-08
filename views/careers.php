<div class="container container__pr">
    <div class="row row__pr ">
        <div class="col-12">
            <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
                <h3 class="card-title text-center fs-6 my-3 fw-bolder"></h3>
                <div class="row">
                    <div class="col-8">

                        <form action="" method="post">
                            <input type="text" name="name" id="searchEnterprise" class="form-control" placeholder="" oninput="search(this.value)">
                        </form>
                    </div>

                    <div class="col-4">
                        <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>career/create"><i class="far fa-plus-square"></i></a>
                        <?php ?>
                    </div>
                </div>

                <div class="card-body my-3 card-body__pr">
                    <table class="table text-center">
                        <thead>

                            <tr>
                                <th scope="col">Nombre</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>
                        <tbody id="info">
                            <?php if ($careers != null) { ?>
                                <?php foreach ($careers as $career) { ?>
                                    <tr>
                                        <td><?php echo $career->getName() ?></td>
                                        <td>
                                            <a class="btn btn-warning text-light" href="<?php echo FRONT_ROOT ?>career/update/<?php echo $career->getId() ?>"><i class="fas fa-edit"></i></a>
                                            <?php if ($career->getActive()) { ?>
                                                <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>career/delete/<?php echo $career->getId() ?>"><i class="fas fa-trash-alt"></i></a>
                                            <?php } else { ?>
                                                <a class="btn btn-success" href="<?php echo FRONT_ROOT ?>career/delete/<?php echo $career->getId() ?>"><i class="fas fa-undo-alt"></i></a>
                                            <?php } ?>
                                        </td>
                                        <!-- Si es admin mostrar editar y eliminar -->
                                        <!-- Si es un estudiante y todavia no se postulo a ningun trabajo postular -->
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5">TODAVIA NO HAY PUESTOS DE TRABAJO PUBLICADOS</td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>