<?php namespace DAO\Interfaces;

interface BaseInterfaceDAO {

    function getById($id);
    function getAll();
    function save($model);
    function update($model);
    function delete($model);
    
    function getInfo($model);
}
