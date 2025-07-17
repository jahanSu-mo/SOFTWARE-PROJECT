<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

// Handle deletion
if(isset($_POST['delete'])){
   $delete_id = $_POST['delete_id'];
   $delete_doctor = $conn->prepare("DELETE FROM `doctors` WHERE id = ?");
   $delete_doctor->execute([$delete_id]);
}

// Fetch all doctors
$select_doctors = $conn->prepare("SELECT * FROM `doctors`");
$select_doctors->execute();
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manege doctor</title>

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

<h1 class="heading">Manage Doctor</h1>


<div class="box-container">

<?php
   $select_doctors = $conn->prepare("SELECT * FROM `doctors`");
   $select_doctors->execute();

   if($select_doctors->rowCount() > 0){
      while($doctor = $select_doctors->fetch(PDO::FETCH_ASSOC)){
   ?>
<div class="box">
<p>Name: <span><?= $doctor['name']; ?></span></p>
   <p>Email: <a href="mailto:<?= $doctor['email']; ?>"><?= $doctor['email']; ?></a></p>
   <p>Phone: <a href="tel:<?= $doctor['phone']; ?>"><?= $doctor['phone']; ?></a></p>
   <p>Specialization: <span><?= $doctor['specialization']; ?></span></p>
   <p>Available Days: <span><?= $doctor['available_days']; ?></span></p>
   <p>Available Time: <span><?= $doctor['available_time']; ?></span></p>
   <p>Room Number: <span><?= $doctor['room_number']; ?></span></p>
   <form action="" method="POST">
   <input type="hidden" name="delete_id" value="<?= $doctor['id']; ?>">
      <input type="submit" name="delete" value="Delete Doctor" class="delete-btn" onclick="return confirm('Are you sure you want to delete this doctor?');">
   </form>
</div>
<?php
   }
}else{
   echo '<p class="empty">no doctor available!</p>';
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