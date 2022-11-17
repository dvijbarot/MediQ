<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='c'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_POST){
        //import database
        include("../connection.php");
        $title=$_POST["title"];
        $cid=$_POST["cid"];
        $pid=$_POST["pid"];
        $date=$_POST["date"];
        $time=$_POST["time"];
        $sql="insert into counschedule (cid,title,scheduledate,scheduletime,pid) values ($cid,'$title','$date','$time',$pid);";
        $result= $database->query($sql);
        header("location: my-app.php?action=session-added&title=$title");
        
    }


?>