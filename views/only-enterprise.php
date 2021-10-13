<?php 
require_once VIEWS_PATH . 'navbar.php';

?>
<p><?php echo $empresa->getId() ?></p>
<p><?php echo $empresa->getFirstName() ?></p>
<p><?php echo $empresa->getDescription() ?></p>
<a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>enterprise">Volver</a>
