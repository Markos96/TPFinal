<?php namespace DAO\Interfaces;

interface BaseInterfaceDAO {

    function getAll();
    function getInfo($model);
    function save($model);
    function update($model);
    function delete($model);

}
