<?php
require "./requires/function.php";

$page = 'accueil';
include "./includes/head.php";

$todos = getAllTodo();


?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Task</th>
                        <th scope="col">Done</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($todos as $todo) {
                        $task_date_created = $todo["created_at"];
                        $task_date_updated = $todo["updated_at"];
                        $dateCreated = new DateTime($task_date_created);
                        $dateUpdated = new DateTime($task_date_updated);
                    ?>
                        <tr>
                            <th scope="row"><?= $todo["id"]; ?></th>
                            <td style="max-width: 120px;"><img <?=
                                !empty($todo["imgPath"]) ?
                                    'src="'.$todo["imgPath"].'"' :
                                    'src="./images/default.jpg"' ; ?>
                                class="img-thumbnail" /></td>
                            <td><?= $todo["task"]; ?></td>
                            <td><?= ($todo["done"] == 0)? "NON":"OUI"; ?></td>
                            <td>

                                <!-- Default switch -->

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="check" class="custom-control-input get_value" id="<?= $todo["id"]; ?>">
                                        <label class="custom-control-label" for="<?= $todo["id"]; ?>">Toggle this switch element</label>
                                        <div id="result"></div>
                                    </div>

                            </td>
                            <td><?= $dateCreated->format('H:i d/m/Y'); ?></td>
                            <td><?= $dateUpdated->format('H:i d/m/Y'); ?></td>
                            <td class="row">

                                <a href="/edit.php?id=<?= $todo["id"]; ?>">
                                    <button class="btn btn-sm btn-info" type="button">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>

                                <form class="ml-2" action="/delete.php" method="post">
                                    <input type="hidden" name="id" value="<?= $todo["id"]; ?>" />
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <a href="/add.php">
                    <button class="btn btn-sm btn-success float-right">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>


<?php

$scripts = ["jquery.min.js", "popperjs.min.js", "bootstrap.min.js", "script-edit.js"];
include "./includes/footer.php";

?>