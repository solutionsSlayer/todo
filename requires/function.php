<?php
require "config/DbPdo.php";

function getConnexion(){
    return DbPdo::pdoConnexion();
}

function getAllTodo(){
    $todos = [];

    $con = getConnexion();
    $query = $con->prepare("SELECT * FROM `todo`");
    $query->execute();

    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($todos, $row);
    }


    return $todos;
}

function createTodo($task){
    $con = getConnexion();
    $query = $con->prepare("INSERT INTO todo (`id`,`task`,`done`) VALUES (NULL, :task, false)");

    return $query->execute(array(':task'=>$task));
}

function getTodoById($id){
    $con = getConnexion();
    $query = $con->prepare("SELECT * FROM todo WHERE id = :id");
    $query->execute(array(":id"=>$id));
    $todo = $query->fetch(PDO::FETCH_ASSOC);
    return $todo;
}

function updateTodo($id, $task){
    $con = getConnexion();
    $query = $con->prepare("UPDATE todo SET `task`= :task WHERE `id`= :id");
    $result = $query->execute(array(":id"=>$id, ":task"=>$task));
    return $result;
}

function deleteTodo($id){
    $con = getConnexion();
    $query = $con->prepare("DELETE FROM todo WHERE id = :id");
    $query->execute(array(":id"=>$id));
}

















