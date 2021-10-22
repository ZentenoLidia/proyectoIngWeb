<?php
echo "I'm in";

function OpenCon()
{
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'mudanzas');

    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Connect failed: %s\n" . $conn->error);
    echo "<br>I connected <br>";

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
