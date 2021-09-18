<?php

if (isset($_POST['create'])){
    include "./../db_conn.php";
    function validade($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validade($_POST['name']);
    $email = validade($_POST['email']);

    $user_data = 'name=' .$name. '&email=' .$email;

    if (empty($name)){
        header("Location: ../index.php?error=Name is required&user_data");
    }else if (empty($email)){
        header("Location: ../index.php?error=Email is required&user_data");
    }else{
        $sql = "INSERT INTO users(name,email) VALUES('$name', '$email')";
        $results = mysqli_query($conn, $sql);
        if ($results){
            header("Location: ../read.php?success=successfully create");
        }else{
            header("Location: ../index.php?error=unknow error occurred&user_data");

        }
    }

}