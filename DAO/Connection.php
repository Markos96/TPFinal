<?php namespace DAO;

use PDO;
use Exception;
use DAO\QueryType;

class Connection
{
    private $pdo = null;
    private $pdoStatement = null;
    private static $instance = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public static function getDataApi($url)
    {

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://utn-students-api.herokuapp.com/api/' . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'));

        $data = curl_exec($curl);

        curl_close($curl);

        return json_decode($data, true);
    }

    public static function GetInstance()
    {
        if (self::$instance == null)
            self::$instance = new Connection();

        return self::$instance;
    }

    public function Execute($query, $parametros = array(), $queryType = QueryType::Query)
    {
        try {
            $this->Prepare($query);

            $this->BindParameters($parametros, $queryType);

            $this->pdoStatement->execute();

            return $this->pdoStatement->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ExecuteNonQuery($query, $parametros = array(), $queryType = QueryType::Query)
    {
        try {
            $this->Prepare($query);

            $this->BindParameters($parametros, $queryType);

            $this->pdoStatement->execute();

            return $this->pdoStatement->rowCount();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    private function Prepare($query)
    {
        try {
            $this->pdoStatement = $this->pdo->prepare($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    private function BindParameters($parametros = array(), $queryType = QueryType::Query)
    {
        $i = 0;

        foreach ($parametros as $nombreParametros => $value) {
            $i++;

            if ($queryType == QueryType::Query)
                $this->pdoStatement->bindParam(":" . $nombreParametros, $parametros[$nombreParametros]);
            else
                $this->pdoStatement->bindParam($i, $parametros[$nombreParametros]);
        }
    }
}
