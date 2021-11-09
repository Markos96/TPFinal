<?php namespace DAO\Interfaces;

interface BaseInterfaceDAO {

    function getById($id);
    function getAll();
    function getInfo($model);
    function save($model);
    function update($model);
    function delete($model);

}
