<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<div class="container">

<aside class="sidebar">

   <!-- sidebar (admin header) -->
   <?php include '../components/admin_header.php'; ?>
   </aside>

   <!-- dashboard content -->
   <main class="dashboard">

      <h1 class="heading">Dashboard</h1>

      <div class="box-container">

         <!-- inside dashboard box section -->
<div class="box">
   <?php
      $select_appointments = $conn->prepare("SELECT * FROM `appointments`");
      $select_appointments->execute();
      $count_appointments = $select_appointments->rowCount();
   ?>
   <h3><?= $count_appointments; ?></h3>
   <p>Book Appointment</p>
   <a href="view_appointments.php" class="btn">Total Appointment</a>
</div>

<div class="box">
   <?php
      $select_appointments = $conn->prepare("SELECT * FROM `appointments`");
      $select_appointments->execute();
      $count_appointments = $select_appointments->rowCount();
   ?>
   <h3><?= $count_appointments; ?></h3>
   <p>Manage Doctor</p>
   <a href="manage_doctor.php" class="btn">View Doctor</a>
</div>


<!-- <div class="box">
   <?php
      $select_patients = $conn->prepare("SELECT * FROM `patients`");
      $select_patients->execute();
      $count_patients = $select_patients->rowCount();
   ?>
   <h3><?= $count_patients; ?></h3>
   <p>Manage Patient</p>
   <a href="manage_patient.php" class="btn">View Patient</a>
</div> -->

<div class="box">
   <?php
      $select_admins = $conn->prepare("SELECT * FROM `admins`");
      $select_admins->execute();
      $count_admins = $select_admins->rowCount();
   ?>
   <h3><?= $count_admins; ?></h3>
   <p>Total Admins</p>
   <a href="admins.php" class="btn">View Admins</a>
</div>

<div class="box">
   <?php
      $select_messages = $conn->prepare("SELECT * FROM `messages`");
      $select_messages->execute();
      $count_messages = $select_messages->rowCount();
   ?>
   <h3><?= $count_messages; ?></h3>
   <p>New Messages</p>
   <a href="messages.php" class="btn">View Messages</a>
</div>


      </div>
   </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="../js/admin_script.js"></script>
<?php include '../components/message.php'; ?>

</body>
</html>
