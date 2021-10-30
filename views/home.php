<div class="wrapper">
  <div class="container d-flex justify-content-center h-100 card__c">
    <div class="card card__p col-lg-12 ">
      <div class="card-header border-bottom-0 h-100 w-100 d-flex justify-content-center align-items-center" style="overflow: hidden;">
        <img src="<?php echo IMG_PATH ?>utn.png" class="card-img-top" alt="logo utn" style="height: 80% !important; width: 100% !important; min-width: 250px; max-width: 550px;">
      </div>
      <div class="card-body h-50">
        <div class="alert alert-<?php echo (isset($alert) ? $alert->getType() : '')?> text-center fw-bold fs-6"><?php echo (isset($alert) ? $alert->getMessage() : '')?></div>
        <form action="<?php echo FRONT_ROOT ?>user/login" method="POST" class="d-flex justify-content-center flex-column" autocomplete="off">
          <div class="mb-3 w-100 d-flex flex-column justify-content-center">
            <label for="email" class="form-label text-center label__p">Email</label>
            <input type="text" name="email" id="email" class="form-control align-self-center input__p mb-3" />
            <label for="password" class="form-label text-center label__p">Password</label>
            <input type="password" name="password" id="password" class="form-control align-self-center input__p" />
          </div>
          <button type="submit" class="btn btn-primary align-self-center btn__p">Acceder</button>
        </form>
      </div>
      <div class="card-footer border-top-0 text-center">
        <p>desarrollo <span>UTN | Lab IV</span></p>
      </div>
    </div>
  </div>
</div>