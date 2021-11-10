<?php namespace Controllers;

use Models\Alert;
use Exception;
use Controllers\ViewController;
use DAO\JobOfferDAO;
use DAO\CareerDAO;
use DAO\EnterpriseDAO;
use DAO\JobPositionDAO;

class JobController {

    private $jobOfferDAO;
    private $enterpriseDAO;
    private $jobPositionDAO;
    private $careerDAO;

    public function __construct()
    {
        $this->jobOfferDAO = new JobOfferDAO();
        $this->enterpriseDAO = new EnterpriseDAO();
        $this->careerDAO = new CareerDAO();
        $this->jobPositionDAO = new JobPositionDAO();
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
        
    }

}
