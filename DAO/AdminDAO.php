<?php

namespace DAO;

use Exception;
use DAO\Connection;
use DAO\Interfaces\IAdminDAO;
use Models\Admin;

class AdminDAO implements IAdminDAO
{

    private $connection = null;
    private $table = 'admin';

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " right outer join User on admin.idUser = User.idUser where admin.idUser = :id";
        $parameters["id"] = $id;
        $admin = null;
        try {
            $this->connection = Connection::GetInstance();
            $info = $this->connection->Execute($query, $parameters);

            if( $info ) {
                $admin = new Admin($info[0]["firstName"], $info[0]["lastName"], $info[0]["dni"], $info[0]["gender"], $info[0]["birthDate"], $info[0]["phoneNumber"], $info[0]["description"], $info[0]["cargo"]);
                $admin->setId($info[0]["idAdmin"]);
            }
            return $admin;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getAll()
    {
    }

    // eliminar
    public function getInfo($user)
    {

        $query = "SELECT * FROM User left outer join admin on User.idUser = admin.idUser where User.idUser = :id";

        $parameters["id"] = $user->getId();

        try {
            $this->connection = Connection::GetInstance();
            $info = $this->connection->Execute($query, $parameters);
            $info = $info[0];
            $user->setName($info["firstName"]);
            $user->setLastname($info["lastName"]);
            $user->setDni($info["dni"]);
            $user->setGender($info["gender"]);
            $user->setBirthdate($info["birthDate"]);
            $user->setPhonenumber($info["phoneNumber"]);
            $user->setIsActive($info["active"]);
            return $user;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function save($user)
    {
    }

    public function update($user)
    {
    }

    public function delete($user)
    {
    }
}
