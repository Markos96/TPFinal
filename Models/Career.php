<?php

namespace Models;

class Career
{


	private $idCareer;
	private $name;
	private $active;

	public function getId()
	{
		return $this->idCareer;
	}

	public function setId($idCareer)
	{
		$this->idCareer = $idCareer;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function setActive($active)
	{
		$this->active = $active;
	}
}
