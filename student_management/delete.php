<?php
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['std_id'])) {
    $std_id = $_POST['std_id'];

    
    $sql = "DELETE FROM stud_table WHERE std_id = $std_id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Error deleting student: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>
