<?php
    $host = "localhost";
    $db = "php_test";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $link = mysqli_connect($host, $username, $password, $db);

    if($link === false) {
        die("Could not connect". mysqli_connect_error());
    }

    $sql = "SELECT * FROM contactInfo";
    $result = mysqli_query($link, $sql);
    
    if ($result->num_rows > 0) {
        echo "All Contact Messages". "<br>";
        while($row = $result->fetch_assoc()) {
            echo "<br>";
          echo "Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
          echo "Email: " . $row["email"]. "<br>";
          echo "Phone Number: " . $row["phone"]. "<br>";
          echo "Message: " . $row["contactMessage"]. "<br>";
        }
      } else {
        echo "0 results";
      }

    mysqli_close($link);
?>