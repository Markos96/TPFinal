<div class="container container__pr">
  <div class="row row__pr ">
    <div class="col-12">
      <div class="d-flex flex-column align-items-center rounded" style="background-color: #DDDDDD;">
        <h3 class="card-title text-center fs-6 my-3 fw-bolder">Empresas</h3>
        <div class="align-self-center card-body mb-3 card-body__pr">
          <form action="<?php echo FRONT_ROOT ?>job/add" method="POST">
            <input class="mb-3 form-control" type="hidden" name="id" value="">
            <input class="mb-3 form-control" type="text" name="firstName" value="" id="" placeholder="Nombre empresa">
            <textarea class="mb-3 form-control" name="description" style="resize: none;font-size: .8rem; height: 200px"></textarea>
            <input type="hidden" class="mb-3 form-control" name="active" value="">
            <div>
              <button type="submit" class="btn btn-primary">enviar</button>
              <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>job">Volver</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>