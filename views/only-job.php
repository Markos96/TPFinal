<div class="container">
    <div class="row">
        <div class="col-12 fs-6 fw-bolder mt-5 p-2 ps-4 text-dark rounded title__pr " style="background-color: #f1f2f6;
background-image: linear-gradient(315deg, #f1f2f6 0%, #c9c6c6 74%);box-shadow: 0 5px 5px rgba(182, 182, 182, 0.75);
"><?php echo $job->getEnterprise()->getName() . " - " . $job->getJobPosition()->getDescription() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column justify-content-center rounded my-4" style="background-color: #DDDDDD;">
                <h3 class="card-title text-center fs-6 my-3 fw-bolder">Informacion</h3>
                <div class="align-self-center card-body mb-3 card-body__pr">
                    <div class="row">

                        <p class="card-text__pr" style="font-size: 1.2rem;"><?php echo $job->getDescription()  ?></p>
                        <hr class="border border-dark border-3">
                        <table class="table table-borderless">
                            <tr>
                                <th class="text-center" style="font-size: .8rem;">Empresa:</th>
                                <td class="text-center" style="font-size: .8rem;"><?php echo $job->getEnterprise()->getName() ?></td>
                            </tr>
                            <tr>
                                <th class="text-center" style="font-size: .8rem;">Carrera:</th>
                                <td class="text-center" style="font-size: .8rem;"><?php echo $job->getCareer()->getName() . " o afines" ?></td>
                            </tr>
                            <tr>
                                <th class="text-center" style="font-size: .8rem;">Posicion:</th>
                                <td class="text-center" style="font-size: .8rem;"><?php echo $job->getJobPosition()->getDescription() ?></td>
                            </tr>
                        </table>
                    </div>
                    <a href="<?php echo FRONT_ROOT ?>enterprise/jobs/<?php echo $job->getEnterprise()->getId() ?>" class="btn btn-primary" role="button"><i class="fas fa-long-arrow-alt-left"></i></a>

                    <?php if ($user->getRol() == STUDENT) { ?>
                        <?php if ($job->getStudent() == null) { ?>
                            <a href="<?php echo FRONT_ROOT ?>job/save_postulation/<?php echo $job->getId() ?>" class="btn btn-success"><i class="fas fa-check"></i></a>
                        <?php } ?>
                        <?php if($user->getRol()== ADMIN) { ?>

<a href="<?php echo FRONT_ROOT ?>enterprise/envio/<?php echo $enterprise->getId() ?>" class="btn btn-success text-light"><i class="fas fa-envelope-open-text"></i></a>
    <?php } ?>
                    <?php } ?>
                    <?php if ($user->getRol() == ENTERPRISE) { ?>
                        <a class="btn btn-warning text-light" href="<?php echo FRONT_ROOT ?>enterprise/job_update/<?php echo $job->getId() ?>" ><i class="fas fa-edit"></i></a>
                        <?php if ($job->getActive()) { ?>
                            <a class="btn btn-danger text-light" href="<?php echo FRONT_ROOT ?>enterprise/job_delete/<?php echo $job->getId() ?>" ><i class="far fa-trash-alt"></i></a>
                        <?php } else {?>
                            <a class="btn btn-success text-light" href="<?php echo FRONT_ROOT ?>enterprise/job_delete/<?php echo $job->getId() ?>" ><i class="fas fa-undo-alt"></i></a>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>