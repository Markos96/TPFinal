<?php

namespace DAO;

use Models\User as User;
use \Exception as Exception;
use DAO\Connection as Connection;
use DAO\Interfaces\IUserDAO as IUserDAO;

class UserDAO implements IUserDAO
{

    private $connection;
    private $table = 'User';

    public function getById($id)
    {}

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            if ($resultSet) {
                $users = array();
                foreach ($resultSet as $row) {
                    $u = new User($row["email"], $row["pass"]);
                    $u->setId($row["idUser"]);
                    $u->setIsActive($row["active"]);
                    $u->setRol($row["rol"]);
                    array_push($users, $u);
                }
                return $users;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getInfo($user)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $parameters["email"] = $user->getEmail();

        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            if ($resultSet && password_verify($user->getPassword(), $resultSet[0]["pass"])) {
                if ($resultSet[0]["active"]) {
                    $user->setId($resultSet[0]["idUser"]);
                    $user->setPassword($resultSet[0]["pass"]);
                    $user->setIsActive($resultSet[0]["active"]);
                    $user->setRol($resultSet[0]["rol"]);
                    return $user;
                } else throw new Exception("Su cuenta esta dada de baja contacte con un administrador");
            } else throw new Exception("Usuario y/o password incorrecto");
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function save($user)
    {
    }

    public function update($user)
    {
        $query = "UPDATE ". $this->table ." SET email = :email, pass = :pass, active = :active, rol = :rol WHERE idUser = :id";

        $parameters["email"] = $user->getEmail();
        $parameters["pass"] = $user->getPassword();
        $parameters["active"] = $user->getActive();
        $parameters["rol"] = $user->getRol();
        $parameters["id"] = $user->getId();

        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters) ? true : false;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function delete($user)
    {
    }
}
