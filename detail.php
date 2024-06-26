<?php include
("header.php") ?>
<?php include("db-config.php") ?>

<div class="container">
    <div class="container-fluid">
        <div>
            <h2>
                <?php echo htmlspecialchars($blogs["title"]) ?>
            </h2>
            <p>
                <?php echo htmlspecialchars($blogs["content"]) ?>
            </p>
        </div>
        <a href="edit.php" class="btn btn-primary">Edit</a>
        <a href="" class="btn btn-primary">Delete</a>
    </div>
</div>
