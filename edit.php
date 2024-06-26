<?php include("header.php") ?>
<?php include("db-config.php") ?>
//This page is to create a new blog post
<?php

    //initialize the fields
    $email = $title = $content = '';
    $errors = array('email'=>'', 'title'=>'', 'content'=>'');

    if(isset($_POST["submit"])){ // Corrected the typo here
        //Email validation
        if(empty($_POST['email'])){
            $errors['email'] = "Email required";
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Please enter a valid email';
            }
        }
        //Title validation
        if(empty($_POST['title'])){
            $errors['title'] = 'Title required';
        } else {
            $title = $_POST['title'];
        }
        //Content validation
        if(empty($_POST['content'])){
            $errors['content'] = 'A blog must have something!';
        } else {
            $content = $_POST['content'];
        }

        if(array_filter($errors)){
            echo "There's errors in the form";
        } else {
            //redirect to homepage if creation is successful

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $content = mysqli_real_escape_string($conn, $_POST['content']);

            //Create a sql query to add to the table
            $sql = "INSERT INTO blogs(email, title, content) VALUES('$email', '$title', '$content');"; // Corrected VALID to VALUES

            //Save to db
            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            } else {
                echo "Saving error: " . mysqli_error($conn);
            }
        }

        //Get ID for detail link

    }
?>

<div class="container">
    <div class="mb-3">
        <form method="POST" action="edit.php">
            <label for="exampleFormControlInput1" class="form-label">Enter your email address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3"> <!-- Added div for consistent styling -->
            <label for="exampleFormControlInput1" class="form-label">Enter your blog title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Give a title for your blog">
        </div> <!-- Closed div for consistent styling -->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Time to write</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <br>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit"> <!-- Added name attribute for the submit button -->
        </form>
    </div>
</div>
