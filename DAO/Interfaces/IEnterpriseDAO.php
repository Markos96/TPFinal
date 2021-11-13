<?php

namespace DAO\Interfaces;

use Models\Enterprise as Enterprise;

interface IEnterpriseDAO extends BaseInterfaceDAO
{

	function getAllActives();
	function getAllInactives();
	function getByCuit($cuit);
}
