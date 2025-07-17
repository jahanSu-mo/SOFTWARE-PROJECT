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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../components/user_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">Doctor dashboard</h1>

   <div class="box-container">

      <div class="box">
     
       <p>My Appoinments</p>
       <a href="../uploaded_files/doctor_appoinment.php" class="btn">view Appoinments</a>
       </div>

      <!-- <div class="box">
       
       
       <p>Medical History</p>
       <a href="../uploaded_files/add_patient.php" class="btn">Patient Record</a>
      </div> -->


       

        
   </div>

</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!-- custom js file link  -->
<script src="../js/script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>