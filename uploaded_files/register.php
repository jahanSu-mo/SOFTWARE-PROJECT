<?php 
include '../components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];
    $role = 'patient'; // Default to patient, or let user choose if needed

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_users->execute([$email]);

    if ($select_users->rowCount() > 0) {
        $warning_msg[] = 'Email already taken!';
    } elseif ($pass !== $c_pass) {
        $warning_msg[] = 'Passwords do not match!';
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $insert_user = $conn->prepare("INSERT INTO `users` (name, email, password, role) VALUES (?, ?, ?, ?)");
        $insert_user->execute([$name, $email, $hashed_pass, $role]);

        if ($insert_user) {
            $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
            $verify_users->execute([$email]);
            $row = $verify_users->fetch(PDO::FETCH_ASSOC);

            if ($verify_users->rowCount() > 0) {
                setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');

                // Redirect based on role
                if ($row['role'] === 'doctor') {
                    header('location:add_doctor.php');
                } else {
                    header('location:home.php');
                }
                exit();
            } else {
                $error_msg[] = 'Something went wrong!';
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php include '../components/user_header.php'; ?>

    <!-- register section starts -->

    <section class="form-container">

        <form action="" method="post">
            <h3>create an account!</h3>
            <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
            <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
            <!-- Removed phone number input -->
            <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
            <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
            <p>already have an account? <a href="login.php">login now</a></p>
            <input type="submit" value="register now" name="submit" class="btn">
        </form>

    </section>

    <!-- register section ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php include '../components/footer.php'; ?>

    <!-- custom js file link -->
    <script src="../js/script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>
