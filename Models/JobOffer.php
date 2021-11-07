<?php namespace Models;

use Models\Enterprise as Enterprise;
use Models\User as User;
use Models\Career as Career;
use Models\JobPosition as JobPosition;

class JobOffer {

    private $id;
    private $enterprise;
    private $student;
    private $career;
    private $jobPosition;
    private $active;
    private $description;
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function getEnterprise()
    {
        return $this->enterprise;
    } 

    public function getStudent()
    {
        return $this->user;
    }

    public function getCareer()
    {
        return $this->career;
    }

    public function getJobPosition()
    {
        return $this->jobPosition;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEnterprise($enterprise)
    {
        $this->enterprise = $enterprise;
    }

    public function setStudent($user)
    {
        $this->user = $user;
    }

    public function setCareer($career)
    {
        $this->career = $career;
    }

    public function setJobPosition($jobPosition)
    {
        $this->jobPosition = $jobPosition;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}

?>