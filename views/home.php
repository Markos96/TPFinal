
<div class="container d-flex justify-content-center card__c">
  <div class="card card__p col-lg-12 ">
    <div class="card-header border-bottom-0 h-100 w-100 d-flex justify-content-center align-items-center" style="overflow: hidden;">
      <img src="<?php echo IMG_PATH?>utn.png" class="card-img-top" alt="logo utn" style="height: 80% !important; width: 100% !important; min-width: 250px; max-width: 550px;">
    </div>
    <div class="card-body h-25">
      <div class="text-warning text-center fw-bold fs-5"><?php echo (isset($this->errors) ? $this->errors : '') ?></div>
      <form action="<?php echo FRONT_ROOT?>student/login" method="POST" class="d-flex justify-content-center flex-column" autocomplete="off">
        <div class="mb-3 w-100 d-flex flex-column justify-content-center">
          <label for="email" class="form-label text-center label__p">Email</label>
          <input type="email" name="email" id="email" class="form-control align-self-center input__p"/>
        </div>
        <button type="submit" class="btn btn-primary align-self-center btn__p">Acceder</button>
      </form>
    </div>
    <div class="card-footer border-top-0 text-center">
      <p>desarrollo <span>UTN | Lab IV</span></p>
    </div>
  </div>
</div>