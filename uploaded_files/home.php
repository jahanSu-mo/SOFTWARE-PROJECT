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
   <title>Hospital management System</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../components/user_header.php'; ?>


<!-- home section starts  -->

<div class="home">

   <section class="center">
 
      <div class="image-overlay"></div>
      <div class="homepage-banner">
        <h1>Hospital Management System</h1>
      </div>

            
         
   </section>

</div>

<!-- home section ends -->






<section class="hero-section">
  <div class="hero-content">
    <div class="left-text">
      <h3 class="highlight">Emergency</h3>
      <h1>Medical Care</h1>
    </div>
    <div class="right-image">
      <img src="../images/medical-emergency.png" alt="Doctors rushing" />
    </div>
  </div>
</section>

<section class="checkup-packages">
  <div class="package-left">
    <h2>Our Health Checkup Packages</h2>
  </div>
  <div class="package-right">
    <ul>
      <li>▶ Executive & General Health Checkup</li>
      <li>▶ Cardiac Health Checkup</li>
      <li>▶ Pre-medical Checkup</li>
    </ul>
  </div>
</section>





<section class="why-choose-us">
    <h2>Why you should choose us</h2>
    <p class="subheading">Special Services</p>
    <div class="ontainer">
      <div class="services left">
        <ul>
          <li><span></span> Thrombolytic Therapy</li>
          <li><span></span> NICU & PICU With 360° Module</li>
          <li><span></span> Modular Operation Theater complex</li>
        </ul>
      </div>

      <div class="doctor-image">
        <img src="../images/doctor-icon.svg" alt="Doctor Image">
      </div>

      <div class="services right">
        <ul>
          <li><span></span> Cardiac center</li>
          <li><span></span> HMS Trauma Center</li>
          <li><span></span> Level 4 Intensive Care Units (ICU)</li>
        </ul>
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