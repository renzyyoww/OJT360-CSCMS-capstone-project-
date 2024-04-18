<?php

include "../conn.php";
session_start();


//submitting pdf 
if(isset($_POST['war'])){
    $date1 = $_POST ['date1'];
    $task1 = $_POST ['task1'];
    $know1 = $_POST ['know1'];
    $date2 = $_POST ['date2'];
    $task2 = $_POST ['task2'];
    $know2 = $_POST ['know2'];
    $date3 = $_POST ['date3'];
    $task3 = $_POST ['task3'];
    $know3 = $_POST ['know3'];
    $date4 = $_POST ['date4'];
    $task4 = $_POST ['task4'];
    $know4 = $_POST ['know4'];
    $date5 = $_POST ['date5'];
    $task5 = $_POST ['task5'];
    $know5 = $_POST ['know5'];
    $name = $_POST['std_name'];
    $company = $_POST['company'];
    $id_num = $_POST['id_num'];
   

    $week = $_POST['week'];

    $time = date('H:i:s');
    $score = "";
    $remarks = "";

    $sql = mysqli_query($conn, "SELECT * FROM war WHERE week = '$week'");
    $num_war =  mysqli_num_rows($sql);
    if($num_war >=1 ){
     
        ?>
        <script>
            alert("This week has been already Submitted");
            window.location.href="weeklyreport.php"
            </script>

        <?php
  
    }else{
        $insert=mysqli_query($conn, "INSERT INTO war VALUE ('','$date1','$name','$week','$task1','$time','$score','$remarks','$know1','$id_num','$company')");
        $insert=mysqli_query($conn, "INSERT INTO war VALUE ('','$date2','$name','$week','$task2','$time','$score','$remarks','$know2','$id_num','$company')");
        $insert=mysqli_query($conn, "INSERT INTO war VALUE ('','$date3','$name','$week','$task3','$time','$score','$remarks','$know3','$id_num','$company')");
        $insert=mysqli_query($conn, "INSERT INTO war VALUE ('','$date4','$name','$week','$task4','$time','$score','$remarks','$know4','$id_num','$company')");
        $insert=mysqli_query($conn, "INSERT INTO war VALUE ('','$date5','$name','$week','$task5','$time','$score','$remarks','$know5','$id_num','$company')");

        if($insert==true){

            ?>
            <script>
                alert("Report Succesfully Submitted");
                window.location.href="weeklyreport.php"
                </script>
    
            <?php  
        }else{
            ?>
        <script>
            alert("Error Submitting Report");
            window.location.href="weeklyreport.php"
            </script>

        <?php
        }
    }

}

//for applying 


if(isset($_POST['apply'])){
    $file=$_FILES['resume']['name'];
    $fileTmpName=$_FILES['resume']['tmp_name'];

    $file1=$_FILES['app_letter']['name'];
    $fileTmpName1=$_FILES['app_letter']['tmp_name'];

    $com_email = $_POST['com_email'];
    $app_name = $_POST['app_name'];
    

 
        $insert=mysqli_query($conn, "INSERT INTO applicants VALUE ('','$app_name','$com_email','$file','$file1','Pending')");

        if($insert==true){
            move_uploaded_file($fileTmpName, 'resume/' .$file);
            move_uploaded_file($fileTmpName1, 'letter/' .$file1);
            ?>
            <script>
                alert("Appling Form Succesfully Submitted");
                window.location.href="index.php"
                </script>
    
            <?php  
        }else{
            ?>
        <script>
            alert("Error Submitting Appling Form");
            window.location.href="index.php"
            </script>

        <?php
        }
    }


    




?>
