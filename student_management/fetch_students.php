<?php
include 'db_connect.php';

$sql = "SELECT * FROM stud_table ORDER BY std_id ASC";
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
                <td>
                    <a href='update1.php?std_id={$row['std_id']}' class='btn btn-warning btn-sm'>Update</a>
                </td>
                
                
                <td>
                    <button class='btn btn-danger btn-sm' onclick='deleteStudent({$row['std_id']})'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='12'>No students found</td></tr>";
}
?>
