<?php
require "./requires/function.php";
include "./includes/head.php";

$id = (isset($_GET["id"]) && !empty($_GET["id"])) ? $_GET["id"] : null;

if ( $_SERVER["REQUEST_METHOD"] == "POST" ){
    $id = (isset($_POST["id"]) && !empty($_POST["id"])) ? $_POST["id"] : null;
    $task = (isset($_POST["task"]) && !empty($_POST["task"])) ? $_POST["task"] : null;
    $updated = updateTodo($id, $task);
    if ($updated){
        header("Location: /index.php");
        exit();
    }
}


$todo = getTodoById($id);
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-5">
                <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
                    <input type="hidden" name="id" value="<?= $todo['id'];?>" />
                    <div class="form-group">
                        <label for="task">Libellé</label>
                        <input type="text"
                               class="form-control"
                               id="task" name="task"
                               placeholder="tâche à faire"
                               value="<?= $todo['task'];?>"
                               required />
                    </div>
                    <div class="form-group">
                        <a href="/index.php">
                            <button type="button" class="btn btn-sm btn-info">Annuler</button>
                        </a>
                        <button class="btn btn-sm btn-danger float-right" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php

$scripts = ["jquery.min.js", "popperjs.min.js", "bootstrap.min.js"];
include "./includes/footer.php";

?>