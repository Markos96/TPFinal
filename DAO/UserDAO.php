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

            echo '<pre>';
            var_dump($resultSet[0]);
            if ($resultSet && password_verify($user->getPassword(), $resultSet[0]["pass"])) {
                if ($resultSet[0]["active"]) {

                    $user->setIsActive($resultSet[0]["active"]);
                    $user->setIdInfo($resultSet[0]["id_info"]);
                    $user->setPassword($resultSet[0]["pass"]);
                    // traemos el estudiante especifico de la API
                    $student = $this->getAPIStudentById('Student', $user->getIdInfo());
                    // seteamos los datos del usuario guardados en la DB
                    $user->setId($resultSet[0]["idUser"]);
                    $user->setRol($resultSet[0]["rol"]);
                    // seteamos los datos en el usuario del estudiante especifico
                    $user->setCareer($this->getCareerNameById($student["careerId"]));
                    $user->setName($student["firstName"]);
                    $user->setLastname($student["lastName"]);
                    $user->setDni($student["dni"]);
                    $user->setFileNumber($student["fileNumber"]);
                    $user->setGender($student["gender"]);
                    $user->setBirthdate($student["birthDate"]);
                    $user->setPhonenumber($student["phoneNumber"]);
                    $user->setIsActive($student["active"]);

                    return $user;
                } else throw new Exception("El usuario no esta activo contacte con administracion para cambiar su situacion");
            } else {
                throw new Exception("Usuario y/o password incorrecto");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    private function getAPIStudentById($url, $id)
    {
        $students = Connection::getDataApi($url);
        var_dump($students);
        foreach ($students as $key => $student) {
            if ($student["studentId"] == $id) {
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
