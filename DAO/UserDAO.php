<?php

namespace DAO;

use Models\User as User;
use DAO\IUserDAO as IUserDAO;
use \Exception as Exception;
use DAO\Connection as Connection;

class UserDAO implements IUserDAO
{

    private $connection;
    private $table = 'User';

    public function add(User $user)
    {
    }

    public function getByEmail(User $user)
    {

        try {
            $query = "SELECT * FROM " . $this->table . " WHERE email = :email";

            $parameters["email"] = $user->getEmail();

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            if ($resultSet && password_verify($user->getPassword(), $resultSet[0]["pass"])) {
                if ($resultSet[0]["active"]) {

                    // datos del usuario
                    $user->setId($resultSet[0]["idUser"]);
                    $user->setIsActive($resultSet[0]["active"]);
                    $user->setIdInfo($resultSet[0]["id_info"]);
                    $user->setPassword($resultSet[0]["pass"]);
                    $user->setRol($resultSet[0]["rol"]);

                    if($user->getRol() == STUDENT) {
                        $info = $this->getAPIStudentByEmail('Student', $user->getEmail());
                        $user->setCareer($this->getCareerNameById($info["careerId"]));
                        $user->setFileNumber($info["fileNumber"]);
                    } else {
                        try{
                            $queryAdmin = "SELECT * FROM User left outer join admin on User.idUser = admin.idUser where User.idUser = :id";
                            $parametersAdmin["id"] = $user->getId();
                            $this->connection::GetInstance();
                            $resultSetAdmin = $this->connection->Execute($queryAdmin, $parametersAdmin);
                            $info = $resultSetAdmin[0];

                        } catch (Exception $ex) {
                            throw $ex;
                        }
                    }
                    // seteamos los datos en el usuario del estudiante especifico
                    $user->setName($info["firstName"]);
                    $user->setLastname($info["lastName"]);
                    $user->setDni($info["dni"]);
                    $user->setGender($info["gender"]);
                    $user->setBirthdate($info["birthDate"]);
                    $user->setPhonenumber($info["phoneNumber"]);
                    $user->setIsActive($info["active"]);

                    return $user;
                } else throw new Exception("El usuario no esta activo contacte con administracion para cambiar su situacion");
            } else {
                throw new Exception("Usuario y/o password incorrecto");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    private function getDBAdminById($id) 
    {

    }

    private function getAPIStudentByEmail($url, $email)
    {
        $students = Connection::getDataApi($url);
        foreach ($students as $key => $student) {
            if ( $student["email"] == $email ) {
                return $student;
            }
        }
    }

    private function getCareerNameById($id)
    {
        $careers = Connection::getDataApi('Career');

        foreach ($careers as $key => $career) {
            if ($career['careerId'] == $id) return $career['description'];
        }
    }
}
