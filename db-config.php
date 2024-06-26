<?php 

    
    //Connect to DB
    $conn = mysqli_connect('localhost', 'brian', 'password', 'php-blog');
    
    if($conn->connect_error){
        echo "Error " . $conn->connect_error;
    }else {
        $sql = "SELECT * FROM blogs;";
        $result = mysqli_query($conn, $sql);
    }

    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $conn->close();
?>

