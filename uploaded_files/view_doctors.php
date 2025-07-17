<?php  
include '../components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Available Doctors</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../components/user_header.php'; ?>

<section class="doctors">
   <h1 class="heading">Available Doctors</h1>
   <div class="box-doc">

   <?php
      $select_doctors = $conn->prepare("SELECT * FROM doctors ORDER BY name ASC");
      $select_doctors->execute();
      if($select_doctors->rowCount() > 0){
         while($row = $select_doctors->fetch(PDO::FETCH_ASSOC)){
            $image = !empty($row['image']) ? '../uploaded_files/' . htmlspecialchars($row['image']) : '../images/default_doctor.png';
   ?>
      <div class="box-d">
         <img src="<?= $image; ?>" alt="Doctor Image" class="doctor-img">
         <h3><?= htmlspecialchars($row['name']); ?></h3>
         <p><strong>Specialization:</strong> <?= htmlspecialchars($row['specialization']); ?></p>
         <p><strong>Email:</strong> <a href="mailto:<?= $row['email']; ?>"><?= $row['email']; ?></a></p>
         <p><strong>Phone:</strong> <a href="tel:<?= $row['phone']; ?>"><?= $row['phone']; ?></a></p>
         <p><strong>Available Days:</strong> <?= htmlspecialchars($row['available_days']); ?></p>
         <p><strong>Available Time:</strong> <?= htmlspecialchars($row['available_time']); ?></p>
         <p><strong>Room Number:</strong> <?= htmlspecialchars($row['room_number']); ?></p>
      </div>
   <?php
         }
      } else {
         echo '<p class="empty">No doctors found.</p>';
      }
   ?>

   </div>
</section>


<?php include '../components/footer.php'; ?>
<script src="../js/script.js"></script>
</body>
</html>
