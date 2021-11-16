<?php

namespace Controllers;

use Models\Alert;
use Exception;
use Controllers\ViewController;
use Models\UserXOffer;
use Models\Session;
use DAO\JobOfferDAO;
use DAO\CareerDAO;
use DAO\EnterpriseDAO;
use DAO\JobPositionDAO;
use DAO\JobOfferXStudentDAO;
use Models\JobOffer;

class JobController
{

    private $jobOfferDAO;
    private $enterpriseDAO;
    private $jobPositionDAO;
    private $careerDAO;
    private $jobOfferXStudentDAO;

    public function __construct()
    {
        $this->jobOfferDAO = new JobOfferDAO();
        $this->enterpriseDAO = new EnterpriseDAO();
        $this->careerDAO = new CareerDAO();
        $this->jobPositionDAO = new JobPositionDAO();
        $this->jobOfferXStudentDAO = new JobOfferXStudentDAO();
    }

    public function index(Alert $alert = null)
    {
        $jobsFull = array();
        $alert = new Alert();
        try {
            $jobs = $this->jobOfferDAO->getAll();
            foreach ($jobs as $job) {
                $job->setCareer($this->careerDAO->getById($job->getCareer()));
                $job->setEnterprise($this->enterpriseDAO->getById($job->getEnterprise()));
                $job->setJobPosition($this->jobPositionDAO->getById($job->getJobPosition()));
                array_push($jobsFull, $job);
            }
            ViewController::showView($alert, 'jobs', $jobsFull);
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'principal_page');
        }
    }

    public function more_info($id)
    {
        $alert = new Alert();
        try {
            $job = $this->jobOfferDAO->getById($id);

            if (!$job)
                throw new Exception("La oferta de trabajo que busca no existe");


            $job->setCareer($this->careerDAO->getById($job->getCareer()));
            $job->setEnterprise($this->enterpriseDAO->getById($job->getEnterprise()));
            $job->setJobPosition($this->jobPositionDAO->getById($job->getJobPosition()));

            ViewController::showView(null, 'only-job', null, $job);
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            $this->index($alert);
        }
    }

    public function save_postulation($idJob)
    {
        $alert = new Alert();
        try {
            $job = $this->jobOfferDAO->getById($idJob);
            if (!$job)
                throw new Exception("La oferta de trabajo no exite");
            $this->jobOfferXStudentDAO->save(Session::getCurrentUser()->getId(), $idJob);
            ViewController::showView(null, 'jobs', $this->index());
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'jobs', $this->index());
        }
    }

    public function postulations($id)
    {
        $alert = new Alert();
        $jobs = array();
        try {
            $offersXuser = $this->jobOfferXStudentDAO->postulations_user($id);
            foreach ($offersXuser as $offerXuser) {
                $job = $this->jobOfferDAO->getById($offerXuser->getIdOffer());
                $job->setEnterprise($this->enterpriseDAO->getById($job->getEnterprise()));
                $job->setCareer($this->careerDAO->getById($job->getCareer()));
                $job->setJobPosition($this->jobPositionDAO->getById($job->getJobPosition()));
                if ($offerXuser->getIdOffer() == $job->getId())
                    $job->setStudent(Session::getCurrentUser()->getId());
                array_push($jobs, $job);
            }
            //echo '<pre>';
            //var_dump($jobs);
            ViewController::showView(null, 'jobs', $jobs);
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            //ViewController::showView($alert, '');
        }
    }

    public function create()
    {
        $alert = new Alert();
        $createJob = new JobOffer();
        try {

            $createJob->setCareer($this->careerDAO->getAll());
            $createJob->setEnterprise($this->enterpriseDAO->getAllActives());
            $createJob->setJobPosition($this->jobPositionDAO->getAll());
            ViewController::showView(null, 'job-form', $createJob);
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'jobs', $this->jobOfferDAO->getAll());
        }
    }
}
