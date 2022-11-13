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
        $docid=$_POST["docid"];
        $pid=$_POST["pid"];
        $date=$_POST["date"];
        $time=$_POST["time"];
        $sql="insert into schedule (docid,title,scheduledate,scheduletime,pid) values ($docid,'$title','$date','$time',$pid);";
        $result= $database->query($sql);
        header("location: schedule.php?action=session-added&title=$title");
        
    }


?>