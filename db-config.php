<?php 

    
    //Connect to DB
    $conn = mysqli_connect('localhost', 'brian', 'password', 'php-blog');
    
    if($conn->connect_error){
        echo "Error " . $conn->connect_error;
    }else {
        $sql = "SELECT * FROM blogs ORDER BY time_created;";
        $result = mysqli_query($conn, $sql);
        $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);
    }
?>

