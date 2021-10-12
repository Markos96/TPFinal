<form action="<?php echo FRONT_ROOT ?>enterprise/add" method="POST">
  <input type="hidden" name="id" value="<?php echo (isset($this->eId) ? $this->eId : "") ?>">
  <input type="text" name="firstName" value="<?php echo (isset($this->eName) ?$this->eName : "")?>" id="" placeholder="Nombre empresa">
  <textarea name="description"><?php echo (isset($this->eDescription) ? $this->eDescription : "" )?></textarea>
  <button type="submit">enviar</button>
</form>
