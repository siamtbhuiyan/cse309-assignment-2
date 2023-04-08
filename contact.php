<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "php_test";
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $link = mysqli_connect($host, $user, $pass, $db);

    if($link === false) {
        die("Failed to Connect. ". mysqli_connect_error());
    }

    $sql = "INSERT INTO contactInfo (firstName, lastName, email, phone, contactMessage) VALUES ('$fname', '$lname', '$email', '$phone', '$message')";
    if(mysqli_query($link, $sql)) {
        echo "Records Added Successfully";
    } else {
        echo "ERROR: Could execute query. ". mysqli_error($link);
    }

    mysqli_close($link);
?>