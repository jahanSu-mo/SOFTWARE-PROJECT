<?php
include '../components/connect.php';

// Optional: Check if admin is logged in (you can customize this)
if (!isset($_COOKIE['admin_id'])) {
    header('location:login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Admin | View Appointments</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
   <style>
      .appointments-table {
         width: 100%;
         border-collapse: collapse;
         margin: 20px 0;
      }

      .appointments-table th, .appointments-table td {
         border: 1px solid #ccc;
         padding: 10px;
         text-align: left;
      }

      .appointments-table th {
         background-color: #00b894;
         color: white;
      }

      .appointments-table tr:nth-child(even) {
         background-color: #f9f9f9;
      }
   </style>
</head>
<body>


<section class="appointments">
   <h1 class="heading">All Booked Appointments</h1>

   <table class="appointments-table">
      <thead>
         <tr>
            <th>Patient Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $select_appointments = $conn->prepare("SELECT * FROM appointments ORDER BY date, time ASC");
         $select_appointments->execute();
         if ($select_appointments->rowCount() > 0) {
            while ($row = $select_appointments->fetch(PDO::FETCH_ASSOC)) {
               echo '<tr>';
               echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
               echo '<td>' . htmlspecialchars($row['email']) . '</td>';
               echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
               echo '<td>' . htmlspecialchars($row['doctor']) . '</td>';
               echo '<td>' . htmlspecialchars($row['date']) . '</td>';
               echo '<td>' . htmlspecialchars($row['time']) . '</td>';
               echo '</tr>';
            }
         } else {
            echo '<tr><td colspan="6">No appointments found.</td></tr>';
         }
         ?>
      </tbody>
   </table>
</section>

<?php include '../components/footer.php'; ?>
<script src="../js/script.js"></script>

</body>
</html>
