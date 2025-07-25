<?php
include '../components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];

    // Find user by email
    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
    $select_users->execute([$email]);
    $row = $select_users->fetch(PDO::FETCH_ASSOC);

    if ($select_users->rowCount() > 0 && password_verify($pass, $row['password'])) {
        // Set cookie and login
        setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('location:home.php');
        exit();
    } else {
        $warning_msg[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php include '../components/user_header.php'; ?>

    <!-- login section starts  -->

    <section class="form-container">

        <form action="" method="post">
            <h3>welcome back!</h3>
            <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
            <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
            <p>don't have an account? </p>
            <input type="submit" value="login now" name="submit" class="btn">
        </form>

    </section>

    <!-- login section ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php include '../components/footer.php'; ?>

    <!-- custom js file link  -->
    <script src="../js/script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>
