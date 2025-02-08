<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $std_id = $_POST['std_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $user_name = $_POST['user_name'];
    $email_id = $_POST['email_id'];
    $dob = $_POST['dob'];
    $std = $_POST['std'];
    $gender = $_POST['gender'];
    $e_year = isset($_POST['e_year']) ? $_POST['e_year'] : ""; 
    $uploadDir = "uploads/";
    
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imagePath = $uploadDir . basename($imageName);

    if (move_uploaded_file($imageTmpName, $imagePath)) {
        
        $sql = "INSERT INTO stud_table (std_id, f_name, l_name, user_name, email_id, dob, std, gender, e_year, image) 
                VALUES ('$std_id', '$f_name', '$l_name', '$user_name', '$email_id', '$dob', '$std', '$gender', '$e_year', '$imagePath')";

        if ($conn->query($sql) === TRUE) {
            echo "New student inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error Uploading Image.";
    }
}
$conn->close();
?>
