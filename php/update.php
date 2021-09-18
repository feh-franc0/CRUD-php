<?php

if (isset($_GET['id'])) {
    include "db_conn.php";
    
    function validade($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validade($_GET['id']);

        
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    include "../db_conn.php";
    function validade($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validade($_POST['name']);
    $email = validade($_POST['email']);
    $id = validade($_POST['id']);


    if (empty($name)){
        header("Location: ../update.php?id=$id&error=Name is required");
    }else if (empty($email)){
        header("Location: ../update.php?id=$id&error=Email is required");
    }else{

        $sql = "UPDATE users
                SET name='$name', email='$email'
                WHERE id=$id";
        $results = mysqli_query($conn, $sql);
        if ($results){
            header("Location: ../read.php?success=successfully updated");
        }else{
            header("Location: ../update.php?id=$id&error=unknow error occurred&user_data");

        }
    }
}else {
    header("Location: read.php");
}