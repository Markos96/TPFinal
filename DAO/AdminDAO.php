<?php

namespace DAO;

use Exception;
use Models\User as User;
use DAO\Connection as Connection;
use DAO\Interfaces\IAdminDAO as IAdminDAO;

class AdminDAO implements IAdminDAO
{

    private $connection = null;
    private $table = 'admin';

    public function getAll()
    {}

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
    {}

    public function update($user)
    {}

    public function delete($user)
    {}
}
