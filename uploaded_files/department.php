<?php  

include '../components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add New Patient</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../components/user_header.php'; ?>




<!-- services section starts  -->

<section class="services">

   <h1 class="heading">our services</h1>

   <div class="box-container">

       <div class="box" onclick="window.location.href='department_doctors.php?specialization=Medicine'">
          <img src="../images/capsule.jpg" alt="">
          <h3>Medicine</h3>
          <p>Lorem ipsum dolor sit amet consectetur</p>
       </div>


       <div class="box" onclick="window.location.href='department_doctors.php?specialization=Cardiology'">
          <img src="../images/cardiology.jpg" alt="">
          <h3>Cardiology</h3>
          <p>Lorem ipsum dolor sit amet consectetur</p>
       </div>

      <div class="box" onclick="window.location.href='department_doctors.php?specialization=Orthopaedic'">
          <img src="../images/orthopedic.jpg" alt="">
          <h3>Orthopaedic</h3>
          <p>Lorem ipsum dolor sit amet consectetur</p>
       </div>

      <div class="box" onclick="window.location.href='department_doctors.php?specialization=Neurology'">
          <img src="../images/neurology.jpg" alt="">
         <h3>Neurology</h3>
          <p>Lorem ipsum dolor sit amet consectetur</p>
      </div>

      <div class="box" onclick="window.location.href='department_doctors.php?specialization=Gastroenterology'">
         <img src="../images/gastrology.png" alt="">
          <h3>Gastroenterology</h3>
          <p>Lorem ipsum dolor sit amet consectetur</p>
       </div>

       <div class="box" onclick="window.location.href='department_doctors.php?specialization=Nephrology'">
         <img src="../images/Nephrology.jpeg" alt="">
          <h3>Nephrology</h3>
          <p>Lorem ipsum dolor sit amet consectetur</p>
       </div>

       <div class="box" onclick="window.location.href='department_doctors.php?specialization=Pharma Team'">
         <img src="../images/Prescription.png" alt="">
          <h3>Pharma Team</h3>
          <p>Lorem ipsum dolor sit amet consectetur,.</p>
       </div>

      <div class="box" onclick="window.location.href='department_doctors.php?specialization=Pediatrics'">
         <img src="../images/Pediatrics.jpg" alt="">
          <h3>Pediatrics</h3>
          <p>Lorem ipsum dolor sit amet consectetur</p>
      </div>

      <div class="box" onclick="window.location.href='department_doctors.php?specialization=Gynecology and Obstetrics'">
          <img src="../images/Gynecology and Obstetrics.png" alt="">
          <h3>Gynecology and Obstetrics</h3>
          <p>Lorem ipsum dolor sit </p>
      </div>

   </div>

</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include '../components/footer.php'; ?>

<!-- custom js file link  -->
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