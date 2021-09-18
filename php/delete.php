<?php

if(isset($_GET['id'])){
    include "../db_conn.php";
    function validade($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validade($_GET['id']);

    $sql = "DELETE FROM users
            WHERE id=$id";
    $results = mysqli_query($conn, $sql);
    if ($results){
        header("Location: ../read.php?success=successfully deleted");
    }else{
        header("Location: ../read.php?error=unknow error occurred&user_data");

    }

}else{
    header("Location: ../read.php");
}