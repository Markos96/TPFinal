<?php

namespace Models;


class Enterprise
{

	private $id;
	private $name;
	private $description;
	private $active;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
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

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

}
