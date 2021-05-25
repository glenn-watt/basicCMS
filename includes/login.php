<?php
    include "db.php";
    session_start();

    if(isset($_POST['Login'])){
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];

        $user_name = mysqli_real_escape_string($connection, $user_name);
        $user_password = mysqli_real_escape_string($connection, $user_password);

        $query="SELECT * FROM users WHERE user_name = '{$user_name}'";
        $select_user_query = mysqli_query($connection, $query);
        if(!$select_user_query){
            die("QUERY FAILED ". mysqli_error());
        }

        while($row = mysqli_fetch_array($select_user_query)){
            $db_user_id = $row['user_id'];
            $db_user_name = $row['user_name'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_roll = $row['user_roll'];
        }
        if($user_name !== $db_user_name && $user_password !== $db_user_password ){
            header("Location: ../index.php");
        } else if($user_name == $db_user_name && $user_password == $db_user_password){
            $_SESSION['user_name'] = $db_user_name;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_roll'] = $db_user_roll;

            header("Location: ../admin");
        }else{
            header("Location: ../index.php");
        }
    }
?>
