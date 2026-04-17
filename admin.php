<!DOCTYPE html>
<html>

<head>
    <title>Display Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Form";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roll Number</th>
                <th>Password</th>
                <th>CNIC</th>
                <th>Gender</th>
                <th>Skills</th>
                <th>Country</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Actions</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['RollNumber'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['CNIC'] . "</td>";
            echo "<td>" . $row['Gender'] . "</td>";
            echo "<td>" . $row['Skills'] . "</td>";
            echo "<td>" . $row['Country'] . "</td>";
            echo "<td>" . $row['DOB'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo '<td>
                    <button onclick="window.location.href=\'delete.php?id=' . $row['RollNumber'] . '\'">Delete</button>
                    <button onclick="window.location.href=\'update.php?id=' . $row['RollNumber'] . '\'">Update</button>
                  </td>';
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found.";
    }
    ?>
    <button class="click" >Show Data</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $("table").hide();
            $('.click').click(function(){
                $('table').show();
            })
        })
    </script>
</body>
</html>