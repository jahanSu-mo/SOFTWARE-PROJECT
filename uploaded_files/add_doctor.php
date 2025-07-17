<?php
include '../components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
    exit();
}

// Fetch current user's data
$get_user = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
$get_user->execute([$user_id]);
$user_data = $get_user->fetch(PDO::FETCH_ASSOC);

// Check if user already exists as a doctor
$check_doctor = $conn->prepare("SELECT * FROM doctors WHERE user_id = ?");
$check_doctor->execute([$user_id]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($check_doctor->rowCount() > 0) {
        $warning_msg[] = 'You are already registered as a doctor.';
    } else {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $specialization = filter_var($_POST['specialization'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $available_days = filter_var($_POST['available_days'], FILTER_SANITIZE_STRING);
        $available_time = filter_var($_POST['available_time'], FILTER_SANITIZE_STRING);
        $room_number = filter_var($_POST['room_number'], FILTER_SANITIZE_STRING);

        // Handle Image Upload
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (!empty($image) && in_array(strtolower($image_ext), $allowed_ext)) {
            $new_image_name = uniqid("doctor_") . "." . $image_ext;
            $image_path = '../uploaded_files/' . $new_image_name;
            move_uploaded_file($image_tmp, $image_path);
        } else {
            $new_image_name = NULL;
        }

        // Insert doctor info
        $insert_doctor = $conn->prepare("INSERT INTO doctors (user_id, name, specialization, email, phone, available_days, available_time, room_number, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_doctor->execute([$user_id, $name, $specialization, $user_data['email'], $phone, $available_days, $available_time, $room_number, $new_image_name]);

        // Update role to doctor
        $update_role = $conn->prepare("UPDATE users SET role = 'doctor' WHERE id = ?");
        $update_role->execute([$user_id]);

        $success_msg[] = 'Doctor profile added successfully!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../components/user_header.php'; ?>

<div class="home">
    <section class="center">
        <div class="form-container">
            <h2>Register New Doctor</h2>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Doctor Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="specialization">Specialization:</label>
                <select id="specialization" name="specialization" required>
                    <option value="">--Select--</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Orthopaedic">Orthopaedic</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Gastroenterology">Gastroenterology</option>
                    <option value="Nephrology">Nephrology</option>
                    <option value="Pharma Team">Pharma Team</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Gynecology and Obstetrics">Gynecology and Obstetrics</option>
                </select>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user_data['email']) ?>" readonly>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="********" readonly>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="available_days">Available Days:</label>
                <input type="text" id="available_days" name="available_days" required>

                <label for="available_time">Available Time:</label>
                <input type="text" id="available_time" name="available_time" required>

                <label for="room_number">Room Number:</label>
                <input type="text" id="room_number" name="room_number" required>

                <label for="image">Upload Profile Photo:</label>
                <input type="file" id="image" name="image" accept="image/*">

                <button type="submit">Add Doctor</button>
            </form>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include '../components/footer.php'; ?>
<script src="../js/script.js"></script>
<?php include '../components/message.php'; ?>
</body>
</html>
