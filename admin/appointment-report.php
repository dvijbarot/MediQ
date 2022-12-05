<?php
include("../connection.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$from_date =$_POST['fromdate'];
$to_date =$_POST['todate'];
$sqlmain= "select pname,paddress,pdob,ptel from patient inner join webuser on patient.pemail = webuser.email where webuser.usertype = 'p' and webuser.CreatedOn between '$from_date' and '$to_date' ";
$html="<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>Data Appointment</title>
        </head>
        <body>
            <h1>Data Appointment</h1>
            <table width='93%' class='sub-table scrolldown' border='0'>
                        <thead>
                        <tr>
                                <th class='table-headin'>
                                    Patient name
                                </th>
                                <th class='table-headin'>
                                    
                                    Appointment number
                                    
                                </th>
                               
                                
                                <th class='table-headin'>
                                    Doctor
                                </th>
                                <th class='table-headin'>
                                    
                                
                                    Session Title
                                    
                                    </th>
                                
                                <th class='table-headin' style='font-size:10px'>
                                    
                                    Session Date & Time
                                    
                                </th>
                                
                                <th class='table-headin'>
                                    
                                    Appointment Date
                                    
                                </th>
                                
                                <th class='table-headin'>
                                    
                                    Events
                                    
                                </tr>
                        </thead>
                        <tbody>
                        ";
                 

                                
                                $result= $database->query($sqlmain);

                                if($result->num_rows==0){
                                    $html.="
                                    <tr>
                                    <td colspan='7'>
                                    <br><br><br><br>
                                    <center>
                                    <img src='../img/notfound.svg' width='25%'>
                                    
                                    <br>
                                    <p class='heading-main12' style='margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)'>We  couldnt find anything related to your keywords !</p>
                                    <a class='non-style-link' href='appointment-a.php'><button  class='login-btn btn-primary-soft btn'  style='display: flex;justify-content: center;align-items: center;margin-left:20px;'>&nbsp; Show all Appointments &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>";
                                    
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
                                 $html.="
 
                            </tbody>

                        </table>
        </body>
    </html>
";
$mpdf->WriteHTML($html);
$mpdf->Output();

?>