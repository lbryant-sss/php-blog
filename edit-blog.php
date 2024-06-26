<?php include("header.php"); ?>
<?php include("db-config.php"); ?>

<?php
    // Get all information on the blog
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM blogs WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $blog = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
    }

    // Update the blog when form is submitted
    if(isset($_POST['update'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        $sql = "UPDATE blogs SET email = '$email', title = '$title', content = '$content' WHERE id = $id";

        if(mysqli_query($conn, $sql)){
            // Redirect to the detail page after successful update
            header('Location: detail.php?id=' . $id);
            exit();
        } else {
            echo "An error has occurred. Try again." . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>

<?php if(isset($blog)): ?>
<div class="container">
    <div class="mb-3">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $blog['id']; ?>">
            <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Edit your email address</label>
                <input name="email" type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($blog['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Edit your blog title</label>
                <input name="title" type="text" class="form-control" id="title" value="<?php echo htmlspecialchars($blog['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Time to write</label>
                <textarea name="content" class="form-control" id="content" rows="3" required><?php echo htmlspecialchars($blog['content']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
        </form>
    </div>
</div>
<?php else: ?>
    <p>The blog you want to edit does not exist. You can create a new one here:</p>
    <a class="btn btn-primary" href="create.php">Create New Blog</a>
<?php endif; ?>
