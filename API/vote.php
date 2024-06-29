<?php
session_start();
include("connect.php");

$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_SESSION['userData']['id'];

$query = "update user set votes = '$total_votes' where id ='$gid' ";

$update_votes = mysqli_query($connect, $query);

$update_user = mysqli_query($connect, "update user set status = 1 where id = '$uid' ");


if ($update_votes and $update_user) {

    $groups = mysqli_query($connect, "select * from user where role=2");
    $groupsData = mysqli_fetch_all($groups, MYSQLI_ASSOC);


    $_SESSION['userData']['status']= 1;
    $_SESSION['groupsData']= $groupsData;

    echo '
         <script>
            alert("Voting Success!!")
            window.location = "../Routes/dashboard.php"
        </script>
        ';

} else {
    echo '
         <script>
            alert("Some Error Occurred")
            window.location = "../Routes/dashboard.php"
        </script>
        ';
}
