<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from doctor where docid=$id;");
        $email=($result001->fetch_assoc())["docemail"];
        $sql= $database->query("update doctor set approved='1' where docid='$id'");


        //print_r($email);
        header("location: new-reg.php");
    }


?>