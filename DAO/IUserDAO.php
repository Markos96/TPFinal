<?php namespace DAO;

use Models\User as User;

interface IUserDAO {

    public function add(User $user);
    public function getAll();
    public function getByEmail(User $user);
}

?>