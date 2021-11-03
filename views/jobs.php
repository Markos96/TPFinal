<div class="container container__pr">
    <div class="row row__pr ">
        <div class="col-12">
            <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
                <h3 class="card-title text-center fs-6 my-3 fw-bolder"></h3>
                <div class="row">
                    <div class="col-8">

                        <form action="" method="post">

                            <input type="text" name="name" id="searchEnterprise" class="form-control" placeholder="" oninput="search(this.value)">
                            <div class="alert alert-<?php echo (isset($this->alert) ? $this->alert->getType() : "") ?> text-center fw-bold fs-6"><?php echo (isset($this->alert) ? $this->alert->getMessage() : "") ?></div>
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
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha de Publicacion</th>
                                <th scope="col">Acciones</th>
                            </tr>

                        </thead>
                        <tbody id="info">

                            <tr>
                                <td>Accenture</td>
                                <td>Java Jr developer</td>
                                <td>Activa</td>
                                <td>1-11-2021</td>
                                <td>
                                    <a class="btn btn-warning text-light" href="<?php echo FRONT_ROOT ?>job/update/"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <!-- Si es admin mostrar editar y eliminar -->
                                <!-- Si es un estudiante y todavia no se postulo a ningun trabajo postular -->
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>