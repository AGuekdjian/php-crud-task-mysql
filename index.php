<?php
include("db.php");
include("includes/header.php");
?>
<div class="container p-4">
    <div class='row'>
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class='alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show' role='alert'>
                    <?= $_SESSION['message'] ?>
                </div>
                <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action='save_task.php' method="POST">
                    <div class="form-group">
                        <input type='text' name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"
                            autofocus></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table>
                <thead>
                    <tr class='flex-column flex-sm-row'>
                        <th class='w-25 p-3 flex-sm-fill text-sm-center bg-secondary border'>Title</th>
                        <th class='w-50 p-3 flex-sm-fill text-sm-center bg-secondary border'>Description</th>
                        <th class='w-50 p-3 flex-sm-fill text-sm-center bg-secondary border'>Created At</th>
                        <th class='w-50 p-3 flex-sm-fill text-sm-center bg-secondary border'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td class='text-sm-center bg-light border'>
                                <?php echo $row['title'] ?>
                            </td>
                            <td class='text-sm-center bg-light border'>
                                <?php echo $row['description'] ?>
                            </td>
                            <td class='text-sm-center bg-light border'>
                                <?php echo $row['created_at'] ?>
                            </td>
                            <td class='text-sm-center bg-light border'>
                                <a href='edit.php?id=<?php echo $row['id'] ?>'>Edit</a>
                                <a href='delete_task.php?id=<?php echo $row['id'] ?>'>Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>