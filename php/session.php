<?php
include('config.php');
session_start();

$conn = OpenCon();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn, "select name from admins where name = '$user_check' ");
if (!$ses_sql) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['name'];

if (!isset($_SESSION['login_user'])) {
    header("Location:../../login-page.html");
    die();
}
