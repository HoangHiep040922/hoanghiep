<?php
    $con = mysqli_connect('localhost','root');

    if($con){
        echo "Connection Successful";
    }
    else {
        echo "Connection Failed";
    }

    mysqli_select_db($con, 'websitetest');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO users (name, email, number, comment) VALUES('$name', '$email', '$number', '$comment')";

    mysqli_query($con, $query);
    header('location:index.php');
?>