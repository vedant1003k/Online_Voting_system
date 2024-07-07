<?php
session_start();

if (!isset($_SESSION['userData'])) {
    echo '
        <script>
        window.location = "../Login/index.html"
        </script>
    ';
    exit();
}

$email = $_SESSION['userData']['email'];
$name = $_SESSION['userData']['name'];
$mobile = $_SESSION['userData']['mobile'];
$address = $_SESSION['userData']['address'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Edit User Details</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <div class="container">
        <div class="mainSection">
            <div id="headerSection">
                <h1>Edit User Details</h1>
                <button onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
            </div>
            <form class="editUserForm" action="../API/editUser.php" method="post" enctype="multipart/form-data">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required value="<?php echo $email ?>" readonly /><br /><br />

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required value="<?php echo $name ?>" /><br /><br />

                <label for="mobile">Mobile: (Unique)</label>
                <input type="text" id="mobile" name="mobile" required value="<?php echo $mobile ?>" /><br /><br />

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required value="<?php echo $address ?>" /><br /><br />

                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" /><br /><br />

                <input type="submit" name="updateUser" value="Update" />
                <!-- <br> -->
                <button type="button" onclick="window.location.href='dashboard.php'">Cancel</button>
            </form>
        </div>
    </div>
</body>

</html>
