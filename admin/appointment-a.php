<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Appointments</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");

    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@edoc.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="doctors.php" class="non-style-link-menu "><div><p class="menu-text">Doctors</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule ">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment menu-active menu-icon-appoinment-active">
                        <a href="appointment.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Appointment</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">Patients</p></a></div>
                    </td>
                </tr>

            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="appointment.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Appointment Manager</p>
                                           
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                        date_default_timezone_set('Asia/Kolkata');

                        $today = date('Y-m-d');
                        echo $today;

                        $list110 = $database->query("select  * from  appointment;");

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                <!-- <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Schedule a Session</div>
                        <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Add a Session</font></button>
                        </a>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Appointments (<?php echo $list110->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <tr>
                <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <td width="5%" style="text-align: center;">
                        From Date:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            
                            <input type="date" name="fromdate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">
                            

                        </td>
                        <td width="5%" style="text-align: center;">
                        To Date:
                        </td>
                        <td width="30%">
                            <input type="date" name="todate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">
                        </td>
                        <td width="12%">
                            <input type="submit"  name="filter" value=" Filter" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                            
                            </form>
                        </td>
                        

                        </tr>
                            </table>

                        </center>
                    </td>
                </tr>   
                <!-- <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <td width="5%" style="text-align: center;">
                        From Date:
                        </td>
                        <td width="30%">
                        <form action="appointment-report.php" method="post">
                            
                            <input type="date" name="fromdate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">
                            

                        </td>
                        <td width="5%" style="text-align: center;">
                        To Date:
                        </td>
                        <td width="30%">
                            <input type="date" name="todate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">
                        </td>
                        <td width="12%">
                            <input type="submit"  name="export" value="Export" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                            
                            </form>
                        </td>
                      

                        </tr> 
                            </table>

                        </center>
                    </td>
                    
                </tr>-->
                
                <?php
                        //print_r($_POST);
                        $sqlmain= "select pname,paddress,pdob,ptel from patient
                        inner join webuser
                        on patient.pemail = webuser.email
                        where webuser.usertype = 'p'";
                        if(isset($_POST['fromdate']) && isset($_POST['todate']))
                        {
                            $from_date = $_POST['fromdate'];
                            $to_date = $_POST['todate'];
                            // echo $from_date;
                            // echo $to_date;
                            $sqlmain= "select pname,paddress,pdob,ptel from patient
                            inner join webuser
                            on patient.pemail = webuser.email
                            where webuser.usertype = 'p'
                            and webuser.CreatedOn between '$from_date' and '$to_date' ";
                        }else{
                            $sqlmain= "select pname,paddress,pdob,ptel from patient
                            inner join webuser
                            on patient.pemail = webuser.email
                            where webuser.usertype = 'p'";
                        }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    Patient name
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    Patient Address
                                    
                                </th>
                               
                                
                                <th class="table-headin">
                                    Date of Birth
                                </th>
                                <th class="table-headin">
                                    
                                
                                    Patient Telephone
                                    
                                    </th>
                                
                            
                        </thead>
                        <tbody>
                        
                            <?php


                                $result= $database->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="7">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $pname=$row["pname"];
                                    $paddress=$row["paddress"];
                                    $pdob = $row["pdob"];
                                    $ptel=$row["ptel"];
                                    echo '<tr >
                                        <td style="text-align: center"> &nbsp;'.
                                        substr($pname,0,25)
                                        .'</td >
                                        <td style="text-align: center"> &nbsp;'.
                                        substr($paddress,0,25)
                                        .'</td >
                                        <td style="text-align: center"> &nbsp;'.
                                        substr($pdob,0,25)
                                        .'</td >
                                        <td style="text-align: center"> &nbsp;'.
                                        substr($ptel,0,25)
                                        .'</td >
                                        

                                        <td>
                                        <div style="display:flex;justify-content: center;">
                                       
                                        </td>
                                    </tr>';
                                    
                                }
                            }
                                 
                            ?>

                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
            </table>
        </div>
    </div>
    
    </div>

</body>
</html>