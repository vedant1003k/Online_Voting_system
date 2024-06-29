<?php

$db = "voting";
$connect = mysqli_connect("localhost", "root", "", $db);

if ($connect) {
    echo "Connection Established";
} else {
    echo "Database Not Connected";
}
