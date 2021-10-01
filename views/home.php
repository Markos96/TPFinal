<h3>Login</h3>


<?php

	require_once "Config/Autoload.php";


	use Models\Enterprise as Empresa;


	$empresa = new Empresa();

	$empresa->setFirstName("Coca Cola");

	echo $empresa->getFirstName();


?>