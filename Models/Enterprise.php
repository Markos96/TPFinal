<?php

namespace Models;


class Enterprise
{

	private $id;
	private $name;
	private $description;
	private $active;
	private $cuit;
	private $idUser;
	

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getIdUser(){
		return $this->idUser;
	}

	public function setIdUser($idUser) {
		$this->idUser = $idUser;
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

	public function getCuit() {
		return $this->cuit;
	}

	public function setCuit($cuit) {
		$this->cuit = $cuit;
	}

}
