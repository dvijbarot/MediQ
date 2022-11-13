<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
</head>
<body>
    <?php


    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    include("../connection.php");
    $userrow = $database->query("SELECT * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];


    
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
                                    <p class="profile-title"><?php echo $username  ?></p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
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
                    <td class="menu-btn menu-icon-home menu-active menu-icon-home-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="qresult.php" class="non-style-link-menu"><div><p class="menu-text">Result</p></a></div>
                    </td>
                </tr>
                
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Questionnaire</p>
                          
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


                                // $patientrow = $database->query("SELECT  * from  patient;");
                                // $doctorrow = $database->query("SELECT  * from  doctor;");
                                // $appointmentrow = $database->query("SELECT  * from  appointment where appodate>='$today';");
                                // $schedulerow = $database->query("SELECT  * from  schedule where scheduledate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                        
                    <!-- <table class="filter-container doctor-header patient-header" style="border: none;width:95%" border="0" >
                    <tr>    
                                
                    </tr>
                    </table> -->
                    <section class="component component--quiz normal">
            <div class="progress"><div class="progress--bar"></div></div>
            <form action="questionnaire.php" method="POST">
                <?php 
                    $qsql = mysqli_query($database,"SELECT * FROM question") or die(mysqli_error($database));

                    $ifsubmitted = mysqli_query($database,"SELECT * FROM questionnaire WHERE pid = $userid");
                    if(mysqli_num_rows($ifsubmitted) > 0){
                        ?>
                        <div class="card-body" style="height:80px; margin-left:50px; margin-top:50px; color:gray;font-size:24px">
                                Only 1 attempt is allowed per user!
                            </div>
                        <?php
                        while($data = mysqli_fetch_array($qsql)){
                       
                        
                        
                ?>      
                    <section class="filter-container" id="question--<?php echo $data['qid']?>" style="padding:20px; margin:20px;">
                        <input type="hidden" name="qid[]" value="<?php echo $data['qid']?>">
                        <p class="small"><?php echo $data['qid']?> of 9 </p>
                        <p><?php echo $data['question'] ?></strong>?</p>
                        <div class="form-item">
                            <input type="radio" id="question--<?php echo $data['qid']?>--1" name="questions[<?php echo $data['qid'] ?>][]" value="0" required disabled><label for="question--<?php echo $data['qid']?>--1" data-question="1"> Not At all</label>
                        </div>
                        <div class="form-item">
                            <input type="radio" id="question--<?php echo $data['qid']?>--2" name="questions[<?php echo $data['qid'] ?>][]" value="1" required disabled><label for="question--<?php echo $data['qid']?>--2" data-question="1"> Several Days</label>
                        </div>
                        <div class="form-item">
                            <input type="radio" id="question--<?php echo $data['qid']?>--3" name="questions[<?php echo $data['qid'] ?>][]" value="2" required disabled><label for="question--<?php echo $data['qid']?>--3" data-question="1"> More Than Half the Days</label>
                        </div>
                        <div class="form-item">
                            <input type="radio" id="question--<?php echo $data['qid']?>--4" name="questions[<?php echo $data['qid'] ?>][]" value="3" required disabled><label for="question--<?php echo $data['qid']?>--4" data-question="1"> Nearly Every Day</label>
                        </div>


                    </section>
                    <?php 
                    } ?>
                        <input type="submit" name="add"  value="You Already Submitted!" style="margin:20px; width:93%;" disabled>
                    <?php }else{ 
                        while($data = mysqli_fetch_array($qsql)){
                       
                        
                        
                       ?>
                     
                           <section class="filter-container" id="question--<?php echo $data['qid']?>" style="padding:20px; margin:20px;">
                               <input type="hidden" name="qid[]" value="<?php echo $data['qid']?>">
                               <p class="small"><?php echo $data['qid']?> of 9 </p>
                               <p><?php echo $data['question'] ?></strong>?</p>
                               <div class="form-item">
                                   <input type="radio" id="question--<?php echo $data['qid']?>--1" name="questions[<?php echo $data['qid'] ?>][]" value="0" required><label for="question--<?php echo $data['qid']?>--1" data-question="1"> Not At all</label>
                               </div>
                               <div class="form-item">
                                   <input type="radio" id="question--<?php echo $data['qid']?>--2" name="questions[<?php echo $data['qid'] ?>][]" value="1" required ><label for="question--<?php echo $data['qid']?>--2" data-question="1"> Several Days</label>
                               </div>
                               <div class="form-item">
                                   <input type="radio" id="question--<?php echo $data['qid']?>--3" name="questions[<?php echo $data['qid'] ?>][]" value="2" required ><label for="question--<?php echo $data['qid']?>--3" data-question="1"> More Than Half the Days</label>
                               </div>
                               <div class="form-item">
                                   <input type="radio" id="question--<?php echo $data['qid']?>--4" name="questions[<?php echo $data['qid'] ?>][]" value="3" required ><label for="question--<?php echo $data['qid']?>--4" data-question="1"> Nearly Every Day</label>
                               </div>
       
       
                           </section>
                           <?php 
                           } ?>
                            <input type="submit" name="add" class="login-btn btn-primary btn" value="Submit" style="margin:20px; width:93%;" >
                    <?php } ?>
                    <div id="bottomofpage"></div>



                    <!-- <div class="container">
                    <p class="quiz--instructions">
                    This [course] is not to be used for diagnosis, treatment or referral services. The materials in CAMH's online courses are only educational tools. They are of general value, and may not apply to specific situations. They are not considered professional advice or guidance for a particular case. Online resources are not a substitute for the personalized judgment and care of a trained medical professional.
                    </p>
                    </div> -->

                </form>
        <?php
            $questions = @$_POST['questions'];
            $submit = @$_POST['add'];

            if($submit){
                // print_r($questions);
                $question_number = 0;
                foreach($questions as $qdata){
                    // print($qdata);
                    $question_number++;
                    $database->query("INSERT into questionnaire(pid,qid,a) values($userid,$question_number,$qdata[0])") or die (mysqli_error($database));
                }
                  
                echo "<script>  window.location.href = 'questionnairesult.php';</script>";
               
            }

        ?>
        </section>
                    
                </td>
                </tr>
            </table>
        </div>
        
    </div>


</body>
</html>