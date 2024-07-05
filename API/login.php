<?php
session_start();
include("connect.php");

$name = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role'];

$query  = "select * from user where name='$name' and password='$password' and role='$role'";
$sql = mysqli_query($connect, $query);

if (mysqli_num_rows($sql) > 0) {

    $userData = mysqli_fetch_array($sql);
    $groups = mysqli_query($connect, "select * from user where role=2");
    $groupsData = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userData'] = $userData;
    $_SESSION['groupsData'] = $groupsData;

    echo '
        <script>
   window.location = "../Routes/dashboard.php"
</script>
    ';
} else {
    echo '
    <script>
   alert("INVALID CREDENTIALS")
   window.location = "../Login/index.html"
</script>
';
}
