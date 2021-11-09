<?php namespace Controllers;

use Models\Alert as Alert;
use Exception as Exception;
use Models\Session as Session;
use DAO\JobOfferDAO as JobOfferDAO;
use Controllers\ViewController as ViewController;
use DAO\EnterpriseDAO;

class JobController {

    private $jobOfferDAO;
    private $enterpriseDAO;

    public function __construct()
    {
        $this->jobOfferDAO = new JobOfferDAO();
        $this->enterpriseDAO = new EnterpriseDAO();
    }

    public function index (Alert $alert = null) {
        $jobsFull = array();
        $jobs = $this->jobOfferDAO->getAll();
        foreach($jobs as $job) {
            $job->setEnterprise($this->enterpriseDAO->getById($job->getEnterprise()));
            array_push($jobsFull, $job);
        }
        ViewController::showView($alert, 'jobs', $jobsFull);
    }

}
