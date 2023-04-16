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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contact Us</title>
</head>
<body>
    <div class="container my-5">
        <?php
            if(mysqli_query($link, $sql)) {
                    echo '<div class="alert alert-success" role="alert">
                    Message Sent.
                    <a href="index.html">Go Back</a>
                </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    ERROR: Could execute query. ' . mysqli_error($link) .
                '</div>';
            }
        ?>
    </div>
</body>
</html>

<?php
mysqli_close($link);
?>