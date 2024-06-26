
<?php include("header.php"); ?>
<?php include("db-config.php"); ?>
<?php
    //This edits a specific blogs

    //Get all information on the blog
    //And access id
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM blogs WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $blog = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
    }
?>



<?php if($id): ?>
<div class="container">
    <div class="mb-3">
        <form method="POST" action="edit-blog?id=<?php $blog['id'] ?>.php">
            <label for="exampleFormControlInput1" class="form-label">Enter your email address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" value=<?php echo htmlspecialchars($blog['email']) ?>>
        </div>
        <div class="mb-3"> <!-- Added div for consistent styling -->
            <label for="exampleFormControlInput1" class="form-label">Enter your blog title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value=<?php echo htmlspecialchars($blog['title']) ?>>
        </div> <!-- Closed div for consistent styling -->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Time to write</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo htmlspecialchars($blog['content']) ?></textarea>
            <br>
            <input class="btn btn-primary" name="update" type="submit" value="Submit"> <!-- Added name attribute for the submit button -->
        </form>
    </div>
</div>

<?php else: ?>
    <p>The blog you want to edit does not exist. You can create a new on here
    <a class="btn btn-primary" href="edit.php"  value="Submit"> 
        Create New Blog
    </a>

    </p>
<?php endif;  ?>