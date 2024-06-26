<?php include("header.php") ?>
<?php include("db-config.php") ?>
<?php
   
?>


        <div class="container card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                <?php
                    echo $row["title"];
                ?>
                </h5>
                <p class="card-text">
                <?php
    echo $row["content"];
?>
</p>
                    <a href="detail.php" class="btn btn-primary">Read the blog</a>
                <a href="edit.php" class="btn btn-primary">Edit</a>
                <a href="detail.php" class="btn btn-primary">Edit</a>
            </div>
        </div>

    </body>
</html>