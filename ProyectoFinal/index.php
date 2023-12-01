<?php include("db.php");  ?>
<?php include("includes/header.php");?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name = "title" class = "form-control"
                        placeholder = "Titulo de la tarea" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="description" rows="2" class = "form-control"
                        placeholder = "Descripcion de la Tarea" ></textarea>
                    </div>
                    <br>
                    <input type="submit" class = "btn btn-success btn-block "
                    name = "save" value = "Guardar">
                </form>
            </div>

        </div>
        <div class="col-md-8">
            
                <table class = "table table-bordered table-striped table-hover">
                    <thead class = "table table-dark">
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tarea";
                        $result_tasks = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id'] ?>"
                                    class = "btn btn-secondary">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>"
                                    class = "btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    </div>
</div>

<?php include("includes/footer.php");?>
  