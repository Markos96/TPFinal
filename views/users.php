<div class="container container__pr">
    <div class="row row__pr">
        <div class="col-12">
            <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
                <h3 class="card-title text-center fs-6 my-3 fw-bolder">Usuarios</h3>
                <div class="card-body my-3 card-body__pr">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>
                                ID
                                </th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) {?>
                                <tr>
                                    <td><?php echo $user->getId() ?></td>
                                    <td><?php echo $user->getEmail() ?></td>
                                    <td><?php echo ($user->getActive() == 1) ? "ACTIVO" : "INACTIVO" ?></td>
                                    <td><?php echo ($user->getRol() == ADMIN) ? "ADMIN" : "USER" ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>