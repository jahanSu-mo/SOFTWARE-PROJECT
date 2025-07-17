<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="#" class="logo"><i class="fas fa-hospital"></i>HMS</a>

         <ul>
            <li><a href="book_appoinment.php">Book an Appointment<i class="fas fa-paper-plane"></i></a></li>
         </ul>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="home.php">Home<i class="fas fa-angle-down"></i></a>
                  <ul>                     
                     <li><a href="about.php">about us</a></i></li>
                     <li><a href="view_doctors.php">View Doctors</a></li>

                  </ul>
               </li>
               
               <li><a href="#">Doctor<i class="fas fa-angle-down"></i></a>
                 <ul>
                 <li><a href="add_doctor.php">Add Doctor</a></li>
                 <li><a href="doctor_appoinment.php">Dashboard</a></li>
                 <!-- <li><a href="doctor_dashboard.php">board</a></li> --> -->

                 <!-- <a href="doctor_appoinment.php" class="btn">view Appoinments</a> -->

                 </ul>

               <li><a href="#">Departmants<i class="fas fa-angle-down"></i></a>
                 <ul>
                 <li><a href="department.php">Services</a></li>

                 </ul>


               <li><a href="#">help<i class="fas fa-angle-down"></i></a>
                  <ul>                     
                     <li><a href="contact.php#faq">FAQ</a></i></li>
                     <li><a href="contact.php">contact us</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
            <li><a href="#">account <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">login now</a></li>
                  <li><a href="register.php">register new</a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="../components/user_logout.php" onclick="return confirm('logout from this website?');">logout</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>

<!-- header section ends -->