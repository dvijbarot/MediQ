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
        $result001= $database->query("select * from counselor where cid=$id;");
        $email=($result001->fetch_assoc())["cemail"];
        $sql= $database->query("update counselor set approved='1' where cid='$id'");

//         echo $stmt->rowCount() . " records UPDATED successfully";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }
        //print_r($email);
        header("location: new-reg.php");
    }


?>