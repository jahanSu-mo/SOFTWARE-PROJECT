<?php
include '../components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';
$doctors = [];

if ($specialization) {
    $get_doctors = $conn->prepare("SELECT * FROM doctors WHERE specialization = ?");
    $get_doctors->execute([$specialization]);
    $doctors = $get_doctors->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title><?= htmlspecialchars($specialization) ?> Doctors</title>
   <link rel="stylesheet" href="../css/style.css">
   <style>
      
      
      /* .doctor-img {
         width: 120px;
         height: 120px;
         object-fit: cover;
         border-radius: 50%;
         margin-bottom: 10px;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      }

      .empty {
         text-align: center;
         color: #666;
         margin-top: 20px;
      } */
   </style>
</head>
<body>

<?php include '../components/user_header.php'; ?>

<section class="services">
   <h1 class="heading"><?= htmlspecialchars($specialization) ?> Doctors</h1>

   <div class="box-doc">
      <?php if (!empty($doctors)): ?>
         <?php foreach ($doctors as $doc): 
            $image = !empty($doc['image']) ? '../uploaded_files/' . htmlspecialchars($doc['image']) : '../images/default_doctor.png';
         ?>
            <div class="box-d">
               <img src="<?= $image ?>" alt="Doctor Image" class="doctor-img">
               <h3><?= htmlspecialchars($doc['name']) ?></h3>
               <p><strong>Email:</strong> <?= htmlspecialchars($doc['email']) ?></p>
               <p><strong>Phone:</strong> <?= htmlspecialchars($doc['phone']) ?></p>
               <p><strong>Room:</strong> <?= htmlspecialchars($doc['room_number']) ?></p>
               <p><strong>Available:</strong> <?= htmlspecialchars($doc['available_days']) ?> (<?= htmlspecialchars($doc['available_time']) ?>)</p>
            </div>
         <?php endforeach; ?>
      <?php else: ?>
         <p class="empty">No doctors found in <?= htmlspecialchars($specialization) ?>.</p>
      <?php endif; ?>
   </div>
</section>

<?php include '../components/footer.php'; ?>
<script src="../js/script.js"></script>

</body>
</html>
