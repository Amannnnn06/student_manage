<?php
include 'db_connect.php';

// Fetch student data if `std_id` is set
$student = null;
if (isset($_GET['std_id'])) {
    $std_id = $_GET['std_id'];

    $query = "SELECT * FROM stud_table WHERE std_id = ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("i", $std_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $student = $result->fetch_assoc();
        } else {
            echo "<p class='text-danger'>No student found with ID: $std_id</p>";
        }
        $stmt->close();
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['std_id'])) {
    $std_id = $_POST['std_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $user_name = $_POST['user_name'];
    $email_id = $_POST['email_id'];
    $dob = $_POST['dob'];
    $std = $_POST['std'];
    $gender = $_POST['gender'];
    $e_year = $_POST['e_year'];

    $update_sql = "UPDATE stud_table SET 
                    f_name = ?, 
                    l_name = ?, 
                    user_name = ?, 
                    email_id = ?, 
                    dob = ?, 
                    std = ?, 
                    gender = ?, 
                    e_year = ? 
                WHERE std_id = ?";
    
    $update_stmt = $conn->prepare($update_sql);
    
    if ($update_stmt) {
        $update_stmt->bind_param("ssssssssi", $f_name, $l_name, $user_name, $email_id, $dob, $std, $gender, $e_year, $std_id);
        $update_stmt->execute();

        if ($update_stmt->affected_rows > 0) {
            echo "<p class='text-success'>Student updated successfully!</p>";
        } else {
            echo "<p class='text-warning'>No changes made.</p>";
        }

        $update_stmt->close();
    } else {
        echo "<p class='text-danger'>Error updating student: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        .main {
            animation: fade-in 1s forwards;
        }
        @keyframes fade-in {
            0% { opacity: 0; transform: translateX(100px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    <main class="main">
        <header class="mx-3 navbar navbar-expand bg-warning mt-3 px-3 rounded d-flex justify-content-between">
            <h3>Update Student</h3>
        </header>

        <section class="container px-3 mt-3">
            <?php if ($student): ?>
            <form action="" method="post">
                <input type="hidden" name="std_id" value="<?= $student['std_id'] ?>">

                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="f_name" class="form-control" value="<?= $student['f_name'] ?>" required>
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="l_name" class="form-control" value="<?= $student['l_name'] ?>" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="user_name" class="form-control" value="<?= $student['user_name'] ?>" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email_id" class="form-control" value="<?= $student['email_id'] ?>" required>
                </div>

                <div class="mb-3">
                    <label>DOB</label>
                    <input type="date" name="dob" class="form-control" value="<?= $student['dob'] ?>" required>
                </div>

                <div class="mb-3">
                    <label>STD</label>
                    <input type="text" name="std" class="form-control" value="<?= $student['std'] ?>" required>
                </div>

                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= $student['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Entry Year</label>
                    <select name="e_year" class="form-control">
                        <option value="">Select year</option>
                        <?php for ($year = 2020; $year <= 2025; $year++): ?>
                            <option value="<?= $year ?>" <?= $student['e_year'] == $year ? 'selected' : '' ?>><?= $year ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
            <?php else: ?>
                <p class="text-danger">Student not found. Please provide a valid ID.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
