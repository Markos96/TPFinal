<div class="container container__pr">
    <div class="row row__pr ">
        <div class="col-12">
            <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
                <h3 class="card-title text-center fs-6 my-3 fw-bolder"><?php if ($job != null) echo (($job->getId() == null) ? "Agregar" : "Modificando" ) . " oferta laboral"?></h3>
                <div class="align-self-center card-body mb-3 card-body__pr">
                    <form action="<?php echo FRONT_ROOT ?>job/add" method="POST">
                        <p class="text-<?php echo (isset($alert) ? $alert->getType() : '') ?> text-center" style="font-size: .8rem;">
                            <?php echo (isset($alert) ? $alert->getMessage() : '') ?>
                        </p>
                        <input class="mb-3 form-control" type="hidden" name="id" value="<?php echo (isset($job) ? $job->getId() : "") ?>">
                        <textarea class="mb-3 form-control" name="description" style="resize: none;font-size: .8rem; height: 200px" placeholder="Agregue una descripcion"><?php echo (isset($job) ? $job->getDescription() : "") ?></textarea>
                        <select name="enterprise" id="" class="form-select mb-3">
                            <option value="">-- Selecione una Empresa -- </option>
                            <?php foreach ($jobs->getEnterprise() as $enterprise) { ?>
                                <option value="<?php echo $enterprise->getId() ?>"
                                <?php if ($job != null) {
                                        echo ($enterprise->getId() == $job->getEnterprise()->getId()) ? "selected" : "disabled";
                                }?>
                                
                                ><?php echo $enterprise->getName() ?></option>
                            <?php } ?>
                        </select>
                        <select name="jobPosition" id="" class="form-select mb-3">
                            <option value="">-- Selecione una Posicion -- </option>
                            <?php foreach ($jobs->getJobPosition() as $jobPosition) { ?>
                                <option value="<?php echo $jobPosition->getId(); ?>"
                                <?php if ($job != null) {
                                        echo ($jobPosition->getId() == $job->getJobPosition()->getId()) ? "Selected" : "";
                                }?>
                                ><?php echo $jobPosition->getDescription() ?></option>
                            <?php } ?>
                        </select>
                        <select name="career" id="" class="form-select mb-3">
                            <option value="">-- Selecione una Carrerra -- </option>
                            <?php foreach ($jobs->getCareer() as $career) { ?>
                                <option value="<?php echo $career->getId() ?>"
                                <?php if ($job != null) {
                                        echo ($career->getId() == $job->getCareer()->getId()) ? "Selected" : "";
                                }?>
                                ><?php echo $career->getName() ?></option>
                            <?php } ?>
                        </select>
                        <input class="mb-3 form-control" type="hidden" name="active" value="<?php echo (isset($jobs) ? $jobs->getActive() : "") ?>">
                        <div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>job">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>