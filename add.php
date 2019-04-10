<?php
require "./requires/function.php";

$page = 'accueil';
include "./includes/head.php";

$task = (isset($_POST["task"]) && !empty($_POST["task"]))? $_POST["task"] : null;

if( $_SERVER["REQUEST_METHOD"] == "POST" && $task){
    if(createTodo($task)){
        header("Location: index.php");
        exit();
    };
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 mt-5">
            <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group">
                    <label for="task">Libellé</label>
                    <input type="text"
                           class="form-control"
                           id="task" name="task"
                           placeholder="tâche à faire"
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
