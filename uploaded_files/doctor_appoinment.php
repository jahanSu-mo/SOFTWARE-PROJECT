<?php

include '../components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id']; // this is the doctor id
} else {
    header('location:../login.php');
    exit();
}

// Fetch doctor data (optional: you already know doctor by user_id)
$get_doctor = $conn->prepare("SELECT * FROM doctors WHERE user_id = ? LIMIT 1");
$get_doctor->execute([$user_id]);
$doctor = $get_doctor->fetch(PDO::FETCH_ASSOC);

if (!$doctor) {
    echo "<p class='empty'>Doctor not found.</p>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php include '../components/user_header.php'; ?>


    <!-- <section class="dashboard">

   <h1 class="heading">Doctor dashboard</h1>

   <div class="box-container">

      <div class="box">
     
       <p>My Appoinments</p>
       <a href="doctor_appoinment.php" class="btn">view Appoinments</a>
       </div>

      
   </div>

</section> -->


    <section class="appointments">
        <h1 class="heading">My Appointments</h1>

        <div class="box-container">
            <?php
            // Fetch appointments based on doctor_id
            $select_appointments = $conn->prepare("SELECT * FROM appointments WHERE doctor_id = ? ORDER BY date ASC, time ASC");
            $select_appointments->execute([$user_id]);

            if ($select_appointments->rowCount() > 0) {
                while ($row = $select_appointments->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <div class="box">
                        <p><strong>Patient Name:</strong> <?= htmlspecialchars($row['fullname']); ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($row['email']); ?></p>
                        <p><strong>Phone:</strong> <?= htmlspecialchars($row['phone']); ?></p>
                        <p><strong>Date:</strong> <?= htmlspecialchars($row['date']); ?></p>
                        <p><strong>Time:</strong> <?= htmlspecialchars($row['time']); ?></p>
                        <p><strong>Booked At:</strong> <?= htmlspecialchars($row['created_at']); ?></p>
                    </div>
            <?php
                }
            } else {
                
                echo '<p class="empty">No appointments found for you.</p>';
            }
            ?>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php include '../components/footer.php'; ?>
    <script src="../js/script.js"></script>
    <?php include '../components/message.php'; ?>
<script>

   let range = document.querySelector("#range");
   range.oninput = () =>{
      document.querySelector('#output').innerHTML = range.value;
   }

</script>
</body>

</html>







