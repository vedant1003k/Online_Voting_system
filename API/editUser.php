<?php
session_start(); // Start the session
include("connect.php");

if (isset($_SESSION['userData'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $photo = $_FILES['photo']['name'];
    $filePath = $_FILES['photo']['tmp_name'];

    // if(

    // Move the uploaded file if a new photo is uploaded
    if ($photo) {
        if (move_uploaded_file($filePath, "../Uploads_image/$photo")) {
            $photoUpdateQuery = ", photo='$photo'";
        } else {
            echo '
                <script>
                    alert("ERROR: Could not upload photo.");
                    window.location = "editUser.html";
                </script>
            ';
            exit();
        }
    } else {
        $photoUpdateQuery = "";
    }

    // Update user details
    $query = "UPDATE user SET name='$name', email='$email', address='$address'$photoUpdateQuery WHERE mobile='$mobile'";
    if (mysqli_query($connect, $query)) {
        // Update session data
        $_SESSION['userData']['name'] = $name;
        $_SESSION['userData']['mobile'] = $mobile;
        $_SESSION['userData']['address'] = $address;
        if ($photo) {
            $_SESSION['userData']['photo'] = $photo;
        }

        echo '
            <script>
                alert("User details updated successfully.");
                window.location = "../Routes/dashboard.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("ERROR: Could not update details. ' . mysqli_error($connect) . '");
                window.location = "../Routes/edit.php";
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("Invalid request.");
            window.location = "../Routes/edit.php";
        </script>
    ';
}
