<?php
include 'db_connect.php';

$sql = "SELECT * FROM stud_table ORDER BY f_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['std_id']}</td>
                <td>{$row['f_name']}</td>
                <td>{$row['l_name']}</td>
                <td>{$row['user_name']}</td>
                <td>{$row['email_id']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['std']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['e_year']}</td>
                <td><img src='uploads/{$row['image']}' width='50' height='50'></td>
                
              </tr>";
    }
} else {
    echo "<tr><td colspan='12'>No students found</td></tr>";
}
?>
