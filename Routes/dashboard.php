<?php
session_start();

if (!isset($_SESSION['userData'])) {
    echo '
        <script>
        window.location = "../Login/index.html"
        </script>
    ';
}

$userData = $_SESSION['userData'];
$groupsData = $_SESSION['groupsData'];

if ($_SESSION['userData']['status'] == 0) {
    $status = '<b style = "color : red">Not Voted</b>';
} else {
    $status = '<b style = "color : Green"> Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVS - DashBoard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div class="mainSection con ">
        <div id="headerSection">
            <!-- <a href="../Login/index.html"><button> Back </button></a> -->
            <a href="edit.php"><button>Edit Detail</button></a>
            <h1>Online Voting System</h1>
            <a href="logout.php"><button> Logout </button></a>
        </div>
    </div>
    <hr>
    <div class="container con ">
        <div id="Profile">
            <img src="../Uploads_image/<?php echo $userData['photo']; ?>" alt="image">
            <b>Name: <?php echo $userData['name']; ?></b>
            <b>Mobile: <?php echo $userData['mobile']; ?></b>
            <b>Address: <?php echo $userData['address']; ?></b>
            <b>Status: </b><?php echo $status ?>
        </div>
        <div id="Group">
            <!-- Display group data here -->
            <?php
            if ($_SESSION['groupsData']) {
                foreach ($groupsData as $group) { ?>
                    <div class="groupItem">
                        <img src="../Uploads_image/<?php echo $group['photo']  ?>" alt="">
                        <b>Group Name: <?php echo $group['name']; ?></b>
                        <b>Votes : <?php echo $group['votes']; ?></b>
                        <form action="../API/vote.php" method="post">
                            <input type="hidden" name="gvotes" id="" value="<?php echo $group['votes'] ?>">
                            <input type="hidden" name="gid" id="" value="<?php echo $group['id'] ?>">

                            <?php
                            if ($_SESSION['userData']['status'] == 0) {
                            ?>
                                <input type="submit" name="votebtn" id="" value="Vote" id="votebtn">
                            <?php
                            } else {
                            ?>
                                <button disabled type="button" name="votebtn" id="" value="Vote" id="voted">Voted</button>
                            <?php
                            }
                            ?>


                        </form>
                    </div>
            <?php }
            } else {
            }
            ?>

            <?php
            ?>
        </div>
    </div>
</body>

</html>