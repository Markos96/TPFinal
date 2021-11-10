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
                        <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>job/form"><i class="far fa-plus-square"></i></a>
                        <?php ?>
                    </div>
                </div>

                <div class="card-body my-3 card-body__pr">
                    <table class="table text-center">
                        <thead>

                            <tr>
                                <th scope="col">Empresa</th>
                                <th scope="col">Posicion</th>
                                <th scope="col">Fecha de Publicacion</th>
                                <th scope="col">Acciones</th>
                            </tr>

                        </thead>
                        <tbody id="info">
                            <?php if ($jobs != null) { ?>
                                <?php foreach ($jobs as $job) { ?>
                                    <tr>
                                        <td><?php echo $job->getEnterprise()->getName() ?></td>
                                        <td><?php echo $job->getJobPosition()->getDescription() ?></td>
                                        <td><?php echo $job->getDate() ?></td>
                                        <td>
                                            <?php if($user->getRol() == ENTERPRISE) {?>
                                            <a class="btn btn-warning text-light" href="<?php echo FRONT_ROOT ?>job/update/"><i class="fas fa-edit"></i></a>
                                            <?php } ?>
                                            <?php if($user->getRol() == ENTERPRISE || $user->getRol() == ADMIN) {?>
                                            <a class="btn btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                            <?php } ?>
                                            <a class="btn btn-info" href="<?php echo FRONT_ROOT ?>job/more_info/<?php echo $job->getId() ?>"><i class="far fa-eye"></i></a>

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