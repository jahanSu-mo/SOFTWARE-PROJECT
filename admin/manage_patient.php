<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){
   $delete_id = $_POST['delete_id'];
   $delete_patient = $conn->prepare("DELETE FROM `patients` WHERE id = ?");
   $delete_patient->execute([$delete_id]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manege patient</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->

<!-- admins section starts  -->



<!-- manage doctor start -->


<div class="container">


   <!-- Main Content -->

   <!-- Sidebar (Placeholder) -->
   <aside class="sidebar">

   <?php include '../components/admin_header.php'; ?>

   </aside>


<section class="grid">

<h1 class="heading">Manage patient</h1>


<div class="box-container">

<?php
   $select_patients = $conn->prepare("SELECT * FROM `patients`");
   $select_patients->execute();
   
   if($select_patients->rowCount() > 0){
      while($patient = $select_patients->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Name: <span><?= $patient['name']; ?></span></p>
      <p>Gender: <span><?= $patient['gender']; ?></span></p>
      <p>Condition: <span><?= $patient['condition']; ?></span></p>
      <p>Appointment Time: <span><?= $patient['appointment_time']; ?></span></p>
      <p>Mandatory Info: <span><?= $patient['mandatory_info']; ?></span></p>
      <form action="" method="POST">
         <input type="hidden" name="delete_id" value="<?= $patient['id']; ?>">
         <input type="submit" value="Delete Patient" onclick="return confirm('Delete this patient?');" name="delete" class="delete-btn">
      </form>
   </div>
   <?php
      }
   } else {
      echo '<p class="empty">No patients available!</p>';
   }
   
?>

</div>

</section>


    <!-- manage doctor end --> -->






<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>