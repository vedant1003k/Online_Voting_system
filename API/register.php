<?php
include("connect.php");

$name = $_POST["name"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$address = $_POST["address"];
$image = $_FILES['photo']['name'];
$filePath = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];


if ($password == $cpassword) {

    move_uploaded_file($filePath, "../Uploads_image/$image");
    // {
    //     echo "File Uploaded";
    // } else {
    //     echo "Uploading Failed";
    // }

    $query = "insert into user(name,mobile,email,password,address,photo,role,status,votes) values('$name','$mobile','$email','$password','$address','$image','$role',0,0)";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        // echo "$name has successfully been registered";
        echo '
         <script>
            alert("Registration Success")
            window.location = "../Login/index.html"
        </script>
        ';
    } else {
        echo '
             <script>
            alert("ERROR NOT REGISTERED")
            window.location = "../Login/index.html"
        </script>
        ';
    }
} else {
    echo '
        <script>
            alert("Password and Confirm password Does Not match")
            window.location = "../Routes/register.html"
        </script>
    
    ';
}
