<?php include("header.php") ?>
<?php include("db-config.php") ?>
<br>
<div class="container text-center">
  <div class="row">
    <div class="col">
    <?php foreach($blogs as $blog): ?>
        <div class="container card col-sm-4" style="width: 28rem;">
            <div class="card-body">
                <h5 class="card-title">
                <?php echo $blog["title"] ?>
                </h5>
                <p class="card-text">
                <?php 
                    $content = $blog["content"];
                    $words = explode(" ", $content);
                    $first_15_words = array_slice($words, 0, 15);

                    $preview = implode(" ", $first_15_words);
                    echo $preview . "...";
                ?>
                </p>
                    <a href="detail.php?id=<?php echo $blog['id']; ?>" class="btn btn-primary">Read the blog</a>
                    <a href="edit-blog.php?id=<?php echo $blog['id']; ?>" class="btn btn-primary">Edit</a>
            </div>
        </div> <br />
<?php endforeach; ?>
    </div>
  </div>
</div>

    </body>
</html>