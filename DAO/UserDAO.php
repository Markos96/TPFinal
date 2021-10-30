<?php namespace DAO;

use Models\User as User;
use DAO\IUserDAO as IUserDAO;
use \Exception as Exception;
use DAO\Connection as Connection;

class UserDAO implements IUserDAO {

    private $connection;
    private $table = 'User';

    public function add (User $user) {

    }

    public function getByEmail (User $user) {

        try {
            $query = "SELECT * FROM " . $this->table . " WHERE email = :email";

            $parameters["email"] = $user->getEmail();
            
            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            if( $resultSet && password_verify($user->getPassword(), $resultSet[0]["pass"]) ) {
                $user->setId($resultSet[0]["idUser"]);
                $user->setRol($resultSet[0]["rol"]);
                return $user;
            } else {
                throw new Exception("Usuario y/o password incorrecto");
            }

        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
