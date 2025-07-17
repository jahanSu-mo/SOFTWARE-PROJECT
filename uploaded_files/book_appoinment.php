<?php   
include '../components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
    exit();
}

// Fetch logged-in user's info
$select_user = $conn->prepare("SELECT * FROM users WHERE id = ?");
$select_user->execute([$user_id]);
$user = $select_user->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $warning_msg[] = 'User not found.';
    exit();
}

if (isset($_POST['submit'])) {
    $id = create_unique_id();
    $fullname = $user['name'];
    $email = $user['email'];
    $phone = isset($_POST['phone']) ? filter_var($_POST['phone'], FILTER_SANITIZE_STRING) : '';
    $doctor_id = filter_var($_POST['doctor_id'], FILTER_SANITIZE_STRING);
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Prevent duplicate booking with same doctor at same time
    $check = $conn->prepare("SELECT * FROM appointments WHERE doctor_id = ? AND date = ? AND time = ?");
    $check->execute([$doctor_id, $date, $time]);

    if ($check->rowCount() > 0) {
        $warning_msg[] = 'Appointment slot already taken!';
    } else {
        $insert = $conn->prepare("INSERT INTO appointments (patient_id, doctor_id, fullname, email, phone, date, time) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([$user_id, $doctor_id, $fullname, $email, $phone, $date, $time]);

        $success_msg[] = 'Appointment booked successfully!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User | Book Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../components/user_header.php'; ?>

<div class="appointment-container">
    <h2>Book an Appointment</h2>
    <form action="" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="<?= $user['name']; ?>" readonly>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?= $user['email']; ?>" readonly>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" value="<?= $user['number']; ?>" required>

        <label for="doctor">Select Doctor:</label>
        <select id="doctor" name="doctor_id" required>
            <option value="">--Choose Doctor--</option>
            <?php
            $get_doctors = $conn->prepare("SELECT doctors.*, users.name AS doctor_name FROM doctors JOIN users ON doctors.user_id = users.id ORDER BY doctor_name ASC");
            $get_doctors->execute();
            if ($get_doctors->rowCount() > 0) {
                while ($doctor = $get_doctors->fetch(PDO::FETCH_ASSOC)) {
                    $doctor_name = htmlspecialchars($doctor['doctor_name']);
                    $specialization = htmlspecialchars($doctor['specialization']);
                    echo "<option value=\"{$doctor['user_id']}\">{$doctor_name} - {$specialization}</option>";
                }
            } else {
                echo '<option disabled>No doctors available</option>';
            }
            ?>
        </select>

        <label for="date">Appointment Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Appointment Time:</label>
        <input type="time" id="time" name="time" required>

        <button type="submit" name="submit">Book Now</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include '../components/footer.php'; ?>
<script src="../js/script.js"></script>
<?php include '../components/message.php'; ?>
</body>
</html>
