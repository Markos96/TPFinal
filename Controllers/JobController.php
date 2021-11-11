<?php namespace Controllers;

use Models\Alert;
use Exception;
use Controllers\ViewController;
use Models\JobOfferXStudent;
use Models\Session;
use DAO\JobOfferDAO;
use DAO\CareerDAO;
use DAO\EnterpriseDAO;
use DAO\JobPositionDAO;
use DAO\jobOfferXStudentDAO;

class JobController {

    private $jobOfferDAO;
    private $enterpriseDAO;
    private $jobPositionDAO;
    private $careerDAO;
    private $jobOfferXStudent;

    public function __construct()
    {
        $this->jobOfferDAO = new JobOfferDAO();
        $this->enterpriseDAO = new EnterpriseDAO();
        $this->careerDAO = new CareerDAO();
        $this->jobPositionDAO = new JobPositionDAO();
        $this->jobOfferXStudent = new JobOfferXStudentDAO();
    }

    public function index (Alert $alert = null) {
        $jobsFull = array();
        $alert = new Alert();
        try {
            $jobs = $this->jobOfferDAO->getAll();
            foreach($jobs as $job) {
                $job->setCareer($this->careerDAO->getById($job->getCareer()));
                $job->setEnterprise($this->enterpriseDAO->getById($job->getEnterprise()));
                $job->setJobPosition($this->jobPositionDAO->getById($job->getJobPosition()));
                array_push($jobsFull, $job);
            }
            ViewController::showView($alert, 'jobs', $jobsFull);
        } catch (Exception $ex){
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'principal_page');
        }
    }

    public function more_info ($id) {
        $alert = new Alert();
        try {
            $job = $this->jobOfferDAO->getById($id);

            if(!$job)
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

    public function save_postulation ($idJob) {
        $alert = new Alert();
        try {
            $job = $this->jobOfferDAO->getById($idJob);
            if(!$job) 
                throw new Exception("La oferta de trabajo no exite");
            $jobOfferXStudent = new JobOfferXStudent(Session::getCurrentUser()->getId(), $idJob);
            $this->jobOfferXStudentDAO->save($jobOfferXStudent); 
            ViewController::showView(null, 'jobs', $this->index());
        } catch (Exception $ex ) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'jobs', $this->index());
        }
    }
}
