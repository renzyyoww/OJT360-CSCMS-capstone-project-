<?php
include "../conn.php";
session_start();
if(empty($_SESSION['student_email'])){
  ?>
  <script>
    alert("Session Empty Please Login");
    window.location.href="../index.html";
    </script>
  <?php
  
}else{
  $e=$_SESSION['student_email'];
  $get_student = mysqli_query($conn,"SELECT * FROM student WHERE student_email='$e'");
  while($row = mysqli_fetch_array($get_student)){
    $name = $row['student_name'];
    $section = $row['section'];
    $id_num = $row['id_num'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OJT|360</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/hero-img.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/hero-img.png" alt="">
        <span class="d-none d-lg-block">OJT|360</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/IMG20230214143946.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Angel Mae Rizaba</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Angel Mae Rizaba</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="index.php">
          <i class="bi bi-grid"></i>
          <span>PARTNER COMPANY</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
<!-- End Profile Page Nav -->

   <!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="weeklyreport.php">
          <i class="bi bi-envelope"></i>
          <span>WEEKLY ACCOMPLISHMENT REPORTS  </span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="evaluation.php">
          <i class="bi bi-card-list"></i>
          <span>EVALUATION</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="announcement.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>ANNOUNCEMENTS</span>
        </a>
      </li><!-- End Login Page Nav -->


  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>WEEKLY ACCOMPLISHMENT REPORT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">weekly accomplishment report</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <form action="process.php" method="POST">
        <input type="hidden" name="id_num" value="<?php echo $id_num?>">
       <table class="table table-bordered">
         <tr>
            <td>Name of student
              
            <input type="text" name="std_name" class="form-control" value="<?php echo $name; ?>" style="border:hidden;">
            </td>
            <td>Inclusive Date:
              <span><input type="text" name="inclusive_date" class="" style="border:hidden;border-bottom: 1px solid black;outline:none;"></span>
            </td>
            
         </tr>
        
         <tr>
            <td>Company:
            
            <input type="text" name="company" style="border:hidden;border-bottom: 1px solid black;outline:none;">
            </td>
            <td>Accumulated Hours
              <span><input type="text" name="" style="border:hidden;border-bottom: 1px solid black;outline:none;"></span>
            </td> 
            
         </tr>
         <tr>
          <td> <span><input type="text" name="week" style="border:hidden;border-bottom: 1px solid black;outline:none;"></span></td>
         </tr>
         
            <tr>
              <th>Date</th>
              <th>Task/Activities</th>
              <th>Knowledge/Skills</th>
            </tr>

            <tr>
              <td><input required type="date" name="date1"  class="form-control"></td>
              <td><input required type="text" name="task1" style="border:hidden;outline:none;" class="form-contro"></td>
              <td><input required type="text" name="know1" style="border:hidden;outline:none;" class="form-contro"></td>

            </tr>
            <tr>
              <td><input required type="date" name="date2"  class="form-control"></td>
              <td><input required type="text" name="task2" style="border:hidden;outline:none;" class="form-contro"></td>
              <td><input required type="text" name="know2" style="border:hidden;outline:none;" class="form-contro"></td>  
            </tr>
            <tr>
              <td><input required type="date" name="date3"  class="form-control"></td>
              <td><input required type="text" name="task3" style="border:hidden;outline:none;" class="form-contro"></td>
              <td><input required type="text" name="know3" style="border:hidden;outline:none;" class="form-contro"></td>
            </tr>
            <tr>
              <td><input required type="date" name="date4"class="form-control"></td>
              <td><input required type="text" name="task4" style="border:hidden;outline:none;" class="form-contro"></td>
              <td><input required type="text" name="know4" style="border:hidden;outline:none;" class="form-contro"></td>
            </tr>
            <tr>
              <td><input required type="date" name="date5"  class="form-control"></td>
              <td><input required type="text" name="task5" style="border:hidden;outline:none;" class="form-contro"></td>
              <td><input required type="text" name="know5" style="border:hidden;outline:none;" class="form-contro"></td>
            </tr>


            
       </table>
       <input type="submit" name="war" class="form-control btn btn-primary" value="Submit">
       </form>



    

       

       
      

            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>OJT</span></strong>.360
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
       <a href="https://bootstrapmade.com/"></a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>