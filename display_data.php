<?php
include('config/connect_db.php');

if ($conn->error) {
    die("This is some issue database connection.");
} else {
    $selectQuery = "SELECT * FROM user_data";

    $data = mysqli_query($conn, $selectQuery);
    if ($data->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Action</th></tr>";
        while ($row = $data->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo '<td> <a href="edit.php?id='.$row['id'].'">Edit</a>&nbsp;&nbsp;<a href="del.php?id='.$row['id'].'">DELETE</a> </td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found";
    }
}

$conn->close();
?>
