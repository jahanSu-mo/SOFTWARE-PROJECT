<?php

include 'connect.php';

setcookie('user_id', '', time() - 1, '/');

header('location:../uploaded_files/home.php');

?>