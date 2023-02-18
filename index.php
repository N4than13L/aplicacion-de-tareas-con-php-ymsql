<?php
    include("db.php");
    include("includes/header.php");
    
?>
    <div class="container p-4">

        <?php if(isset($_SESSION['message'])){  ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'];  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
        <?php session_unset(); }?>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control"
                            placeholder="agregar tarea" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description"   rows="2" 
                            name="description" class="form-control mt-2"
                            placeholder="agregar descripcion"></textarea>
                        </div>
                        <input type="submit"
                        value="guardar tarea" name="save_task" class="btn btn-success mt-2">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>titulo</th>
                            <th>descripcion</th>
                            <th>fecha de creacion</th>
                            <th>actiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "select * from task";
                            $resul_task = mysqli_query($conn, $query);

                             while ($row = mysqli_fetch_array($resul_task)) { ?>
                                <tr>
                                    <td> 
                                        <?php echo $row['title'] ?>
                                    </td>
                                    <td> 
                                        <?php echo $row['description'] ?>
                                    </td>
                                    <td> 
                                        <?php echo $row['created_at'] ?>
                                    </td>

                                    <td> 
                                        <a href="edit_task.php?id=<?php echo $row['id']?>" 
                                        class="btn btn-warning">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                    </td>
                                    <td> 
                                        <a href="delete_task.php?id=<?php echo $row['id']?>" 
                                        class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>  
                    <tbody>
                </table>
            </div>
        </div>
    </div>

<?php
    include("includes/footer.php");
?>
    