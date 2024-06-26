<?php include
("header.php") ?>
<?php include("db-config.php") ?>

<?php

    //Get the id from url
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //Query to get the specific blog

        $sql = "SELECT * FROM blogs WHERE id = $id";

        $blog_result = mysqli_query($conn, $sql);

        //Get the specific colum
        $blog = mysqli_fetch_assoc($blog_result);

    }
    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM blogs WHERE id = $id";
        $delete = mysqli_query($conn, $sql);

        if(mysqli_query($conn, $sql)){
            echo "Deleted Succesfully";
            header('Location: index.php');
        } else {
            echo 'Error deleting' . mysqli_error($conn);
        }
        mysqli_free_result($blog_result);
        mysqli_close($conn);
    }

?>

<div class="container">
    <?php if($blog): ?>
    <div class="container-fluid">
        <div>
            <h2>
                <?php echo htmlspecialchars($blog["title"]) ?>
            </h2>
            <h5>Created by: <?php  echo $blog['email'] ?> On: <?php echo $blog['time_created'] ?></h5>
            <p>
                <?php echo htmlspecialchars($blog["content"]) ?>
            </p>
        </div>
        <a href="edit.php?id=<?php echo $blog['id']; ?>" class="btn btn-primary">Edit</a>
        <form method="POST" action="detail.php">
            <input type="hidden" name="id_to_delete" value="<?php echo $blog['id'] ?>"> <br>
            <input type="submit" name="delete" class="btn btn-primary" value="Delete">

        </form>
    </div>
    <?php else: ?>
        <p> No such blog. Try again. </p>
    <?php endif; ?>
</div>
