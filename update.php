<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollNumber = $_POST['rollNumber'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cnic = $_POST['cnic'];
    $gender = $_POST['gender'];
    $skills = implode(", ", $_POST['skills']);
    $country = $_POST['country'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = "UPDATE Form SET
                Name = '$name',
                Email = '$email',
                Password = '$password',
                CNIC = '$cnic',
                Gender = '$gender',
                Skills = '$skills',
                Country = '$country',
                DOB = '$dob',
                Address = '$address'
            WHERE RollNumber = '$rollNumber'";

    if (mysqli_query($conn, $sql)) {
        echo "Row updated successfully.";
        header('location:admin.php');
    } else {
        echo "Error updating row: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $rollNumber = $_GET['id'];

    $sql = "SELECT * FROM Form WHERE RollNumber = '$rollNumber'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $name = $row['Name'];
        $email = $row['Email'];
        $password = $row['Password'];
        $cnic = $row['CNIC'];
        $gender = $row['Gender'];
        $skills = explode(", ", $row['Skills']);
        $country = $row['Country'];
        $dob = $row['DOB'];
        $address = $row['Address'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Data</title>
    <style>
           .one{
    background-color: slategray;
    margin-left: 20%;
    margin-right: 20%;
    padding: 20px;
    border-style: solid ;
border-color: rgb(17, 17, 17);
    }
    </style>
</head>

<body>
    <h2>Update Form</h2>
    <form method="POST" action="" class="one">
        <input type="hidden" name="rollNumber" value="<?php echo $rollNumber; ?>">
        <label for="">Roll Number</label>
        <input type="text" disabled name="" value="<?php echo $rollNumber; ?>"> </br></br>

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $password; ?>"><br><br>
        <label>CNIC:</label>
        <input type="text" name="cnic" value="<?php echo $cnic; ?>"><br><br>
        <label>Gender:</label>
        <input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo 'checked'; ?>> Male
        <input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo 'checked'; ?>> Female<br><br>
        <label>Skills:</label>
        <input type="checkbox" name="skills[]" value="MS Word" <?php if (in_array('MS Word', $skills)) echo 'checked'; ?>> MS Word
        <input type="checkbox" name="skills[]" value="MS PowerPoint" <?php if (in_array('MS PowerPoint', $skills)) echo 'checked'; ?>> MS PowerPoint
        <input type="checkbox" name="skills[]" value="MS Excel" <?php if (in_array('MS Excel', $skills)) echo 'checked'; ?>> MS Excel<br><br>
        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="">Select a country</option>
            <option value="pakistan" <?php if ($country === 'pakistan') echo 'selected'; ?>>Pakistan</option>
            <option value="usa" <?php if ($country === 'usa') echo 'selected'; ?>>USA</option>
            <option value="uk" <?php if ($country === 'uk') echo 'selected'; ?>>UK</option>
            <option value="india" <?php if ($country === 'india') echo 'selected'; ?>>India</option>
            <option value="australia" <?php if ($country === 'australia') echo 'selected'; ?>>Australia</option>
        </select><br><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $dob; ?>"><br><br>
        <label>Address:</label>
        <textarea name="address"><?php echo $address; ?></textarea><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>

</html>