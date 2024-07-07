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



// $sql1 = "select * from user";
// $co = mysqli_query($connect, $sql1);

// if (mysqli_num_rows($co) > 0) {
//     echo '
//     <script>
//        alert("Tabel exsist")
//        window.location = "../Login/index.html"
//    </script>
//    ';
// }

$sql2 =  "select * from user where mobile =$mobile";
$result = mysqli_query($connect, $sql2);
if ($result && mysqli_num_rows($result) > 0) {
    echo '
        <script>
            alert("User is already Registered");
            window.location = "../Login/index.html";
        </script>
    ';
} else {

    if ($password == $cpassword) {

        move_uploaded_file($filePath, "../Uploads_image/$image");

        $query = "insert into user(name,mobile,password,email,address,photo,role,status,votes) values('$name','$mobile','$password','$email','$address','$image','$role',0,0)";
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
            // echo mysqli_error($connect);
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
}
