
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
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
                    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="doctors.php" class="non-style-link-menu "><div><p class="menu-text">Doctors</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="counselor.php" class="non-style-link-menu "><div><p class="menu-text">Counselors</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">Patients</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="new-reg.php" class="non-style-link-menu"><div><p class="menu-text">Approvals</p></a></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="2" class="nav-bar" >
                                
                                <form action="doctors.php" method="post" class="header-search">
        
                                    <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                                    
                                    <?php
                                        echo '<datalist id="doctors">';
                                        $list11 = $database->query("select  docname,docemail from  doctor;");
        
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $d=$row00["docname"];
                                            $c=$row00["docemail"];
                                            echo "<option value='$d'><br/>";
                                            echo "<option value='$c'><br/>";
                                        };
        
                                    echo ' </datalist>';
                                    ?>
                                    
                               
                                    <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                
                                </form>
                                
                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('US/Eastern');
        
                                $today = date('Y-m-d');
                                echo $today;

                    //Patient Data
                                $patientrow = $database->query("select * from webuser where usertype='p' and CreatedOn='$today'; ");
                                $monthpatientrow = $database->query("select * from webuser where usertype='p' and (month(CreatedOn)=month('$today'));");
                                $weekpatientrow = $database->query("select  * from  webuser where usertype='p' and (week(CreatedOn)=week('$today'));");
                                $totpatientrow = $database->query("select  * from webuser where usertype='p';");
                                
                                //Doctor and Couns Data

                                $totdoc = $database->query("select * from doctor; ");
                                $totcoun = $database->query("select * from counselor;");

                                //Appointment data

                                $doctorapp = $database->query("select * from schedule where scheduledate>='$today';");
                                $counsapp = $database->query("select * from counschedule where scheduledate>='$today';");

                                //Assessments Data

                                $totassess = $database->query("select distinct pid from questionnaire;");

                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
       
                            
                        </tr>
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <h2 style="width:30%;hieght:20%;" class="page-header">Analytics Reports</h2>
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
                        <div class="">
                        <table width="93%" class="sub-table" border="0">
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
                <tr>
                                <td colspan="4">
                                    <h3 style="width:30%;hieght:20%;" >Patient Registrations</h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 33.33%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $patientrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Today &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 33.33%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $weekpatientrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    This Week &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 33.33%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                                <div class="h1-dashboard" >
                                                    <?php    echo $monthpatientrow ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                    This Month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $totpatientrow ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                    Total Registrations 
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <h3 style="width:30%;hieght:20%;" >Activites</h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $totdoc->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $totcoun->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Counsellors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                                <div class="h1-dashboard" >
                                                    <?php    echo ($doctorapp ->num_rows + $counsapp->num_rows)  ?>
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                    Upcoming Appointments &nbsp;   
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $totassess ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                    Assessments Taken 
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>

                 
                        </table>
                        </center>
                        </td>
                </tr>
            </table>
            
                
            
        </div>
        
    </div>
      
   
                                    

</body>
</html>