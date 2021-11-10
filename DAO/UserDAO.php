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

            if ($resultSet) {
                
                    return false;
            
            }
            else{
                return true;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function save($user)
    {
        $query = "INSERT INTO " . $this->table . " (email,password,active,rol) VALUES (:name,:pass,:active,:rol)";
        echo $parameters["email"] = $user->getEmail();
        echo $parameters["pass"] = $user->getPassword();
        echo $parameters["active"] = $user->getActive();
        echo $parameters["rol"] = $user->getRol();
        
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
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
        $query = "UPDATE " . $this->table . " SET active = :active WHERE idUser = :idUser";
        $parameters["active"] = ($user->getActive()) ? 1 : 0;
        $parameters["idUser"] = $user->getId();
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
