<?php
include('config.php');
if (($conn = OpenCon()) != false) {
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 

        echo "I'm in";
        $myusername = mysqli_real_escape_string($conn, $_POST['inputEmail']);
        $mypassword = mysqli_real_escape_string($conn, $_POST['inputPass']);

        $sql = "SELECT id FROM admins WHERE name = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['id'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {
            $_SESSION['login_user'] = $myusername;

            header("location: welcome.php");
        } else {
            $error = "Your Login Name or Password is invalid";
            $_SESSION['error_msg'] = $error;
            header("Location:../../login-page.html");
            die();    
        }
    }
}
