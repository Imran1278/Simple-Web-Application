<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rollNumber = $_POST["roll_number"];
    $password = $_POST["password"];
    $cnic = $_POST["cnic"];
    $gender = $_POST["gender"];
    $skills = implode(", ", $_POST["skills"]); // Convert skills array to comma-separated string
    $country = $_POST["country"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];

    $sql = "INSERT INTO Form (RollNumber, Name, Email, Password, CNIC, Gender, Skills, Country, DOB, Address)
            VALUES ('$rollNumber', '$name', '$email', '$password', '$cnic', '$gender', '$skills', '$country', '$dob', '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <style>
        input {
            margin: 10px 0px;
        }


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
    <form action="" method="POST" class="one">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="roll_number">Roll Number:</label>
        <input type="text" id="roll_number" name="roll_number" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="cnic">CNIC:</label>
        <input type="text" id="cnic" name="cnic" required><br>

        <label for="gender">Gender:</label>
        <label>Gender:</label><br>
        <input type="radio" id="gender_male" name="gender" value="male" required>
        <label for="gender_male">Male</label><br>

        <input type="radio" id="gender_female" name="gender" value="female" required>
        <label for="gender_female">Female</label><br>



        <label for="skills">Skills:</label><br>
        <input type="checkbox" id="ms_word" name="skills[]" value="MS Word">
        <label for="ms_word">MS Word</label><br>
        <input type="checkbox" id="ms_powerpoint" name="skills[]" value="MS PowerPoint">
        <label for="ms_powerpoint">MS PowerPoint</label><br>
        <input type="checkbox" id="ms_excel" name="skills[]" value="MS Excel">
        <label for="ms_excel">MS Excel</label><br>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="" disabled selected>Select a country</option>
            <option value="pakistan">Pakistan</option>
            <option value="usa">USA</option>
            <option value="uk">UK</option>
            <option value="india">India</option>
            <option value="australia">Australia</option>
        </select><br>


        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br>

        <label for="address">Address:</label> </br>
        <textarea id="address" name="address" required></textarea><br>

        <input type="submit" name="submit" value="Submit">
        <button><a href="./admin.php" style="text-decoration:none;" >View Data</a></button>
    </form>

     
</body>

</html>